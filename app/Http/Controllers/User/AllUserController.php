<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class AllUserController extends Controller
{
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.order-view', compact('orders'));
    }

    public function orderDetails($order_id)
    {
        $order = Order::with('city', 'district', 'ward', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem  = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.order-details', compact('order', 'orderItem'));
    }

    public function invoiceDownload($order_id)
    {
        $order = Order::with('city', 'district', 'ward', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem  = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        $pdf = Pdf::loadView('frontend.user.order.order-invoice', compact('order', 'orderItem'))
            ->setPaper('a4')
            ->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
                'isFontSubsettingEnabled' => true,
                'isHtml5ParserEnabled' => true,
                'defaultFont' => 'DejaVu Sans',
                'fontDir' => public_path('fonts'),
            ]);
        return $pdf->download('invoice.pdf');
    }

    public function returnOrder(Request $request, $order_id)
    {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d/m/Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Yêu cầu trả hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
    }

    public function returnOrderList()
    {
        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.return-order-view', compact('orders'));
    }

    public function cancelOrders()
    {
        $orders = Order::where('user_id', Auth::id())->where('status', 'cancel')->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.cancel-order-view', compact('orders'));
    }

    public function orderTraking(Request $request)
    {
        $invoice = $request->code;
        $track = Order::where('invoice_no', $invoice)->first();
        if ($track) {
            return view('frontend.tracking.track-order', compact('track'));
        } else {
            $notification = array(
                'message' => 'Mã hóa đơn không hợp lệ',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
