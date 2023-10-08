<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function pendingOrders()
    {
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('backend.order.pending-orders', compact('orders'));
    }

    public function pendingOrdersDetails($order_id)
    {
        $order = Order::with('city', 'district', 'ward', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.order.pending-orders-details', compact('order', 'orderItem'));
    }

    public function confirmedOrders()
    {
        $orders = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();
        return view('backend.order.confirmed-orders', compact('orders'));
    }

    public function processingOrders()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.order.processing-orders', compact('orders'));
    }

    public function pickedOrders()
    {
        $orders = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();
        return view('backend.order.picked-orders', compact('orders'));
    }

    public function shippedOrders()
    {
        $orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('backend.order.shipped-orders', compact('orders'));
    }

    public function deliveredOrders()
    {
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.order.delivered-orders', compact('orders'));
    }

    public function cancelOrders()
    {
        $orders = Order::where('status', 'cancel')->orderBy('id', 'DESC')->get();
        return view('backend.order.cancel-orders', compact('orders'));
    }

    public function pendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'confirm']);

        $notification = array(
            'message' => 'Xác nhận đơn hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('pending-orders')->with($notification);
    }

    public function confirmToProcessing($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'processing']);

        $notification = array(
            'message' => 'Xử lý đơn hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed-orders')->with($notification);
    }


    public function processingToPicked($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'picked']);

        $notification = array(
            'message' => 'Đóng hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('processing-orders')->with($notification);
    }


    public function pickedToShipped($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'shipped']);

        $notification = array(
            'message' => 'Đơn hàng đã được vận chuyển thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('picked-orders')->with($notification);
    }


    public function shippedToDelivered($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'delivered']);
        $product = OrderItem::where('order_id', $order_id)->get();

        foreach ($product as $item) {
            Product::where('id', $item->product_id)->update(['product_qty' => DB::raw('product_qty-' . $item->qty)]);
        }

        Order::findOrFail($order_id)->update(['status' => 'delivered']);

        $notification = array(
            'message' => 'Đơn hàng đã được giao thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('shipped-orders')->with($notification);
    }

    public function adminInvoiceDownload($order_id)
    {
        $order = Order::with('city', 'district', 'ward', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('backend.order.order-invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
