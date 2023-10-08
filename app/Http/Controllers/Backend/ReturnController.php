<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ReturnController extends Controller
{
    public function returnRequest()
    {
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('backend.return_order.return-request', compact('orders'));
    }

    public function returnRequestApprove($order_id)
    {
        Order::where('id', $order_id)->update(['return_order' => 2]);

        $notification = array(
            'message' => 'Trả lại đơn hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function returnAllRequest()
    {
        $orders = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('backend.return_order.all-return-request', compact('orders'));
    }
}
