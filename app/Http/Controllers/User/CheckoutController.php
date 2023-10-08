<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDistrict;
use App\Models\ShipWards;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function districtGetAjax($city_id)
    {
        $ship = ShipDistrict::where('city_id', $city_id)
            ->orderBy('district_name', 'ASC')
            ->get();
        return json_encode($ship);
    }

    public function wardGetAjax($district_id)
    {
        $ship = ShipWards::where('district_id', $district_id)
            ->orderBy('ward_name', 'ASC')
            ->get();
        return json_encode($ship);
    }

    public function checkoutStore(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['city_id'] = $request->city_id;
        $data['district_id'] = $request->district_id;
        $data['ward_id'] = $request->ward_id;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data', 'cartTotal'));
        } else {
            return view('frontend.payment.cash', compact('data', 'cartTotal'));
        }
    }
}
