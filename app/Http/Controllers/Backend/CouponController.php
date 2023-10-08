<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function couponView()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.view-coupon', compact('coupons'));
    }

    public function couponStore(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function couponEdit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit-coupon', compact('coupon'));
    }

    public function couponUpdate(Request $request, $id)
    {
        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),

        ]);

        $notification = [
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        ];

        return redirect()->route('coupon.manage')->with($notification);
    }

    public function couponDelete($id)
    {
        Coupon::findOrFail($id)->delete();
        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
