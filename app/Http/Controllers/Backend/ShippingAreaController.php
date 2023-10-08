<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipCity;
use App\Models\ShipDistrict;
use App\Models\ShipWards;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function cityView()
    {
        $citys = ShipCity::orderBy('id', 'DESC')->get();
        return view('backend.ship.city.view-city', compact('citys'));
    }

    public function cityStore(Request $request)
    {
        $request->validate([
            'city_name' => 'required',
        ]);

        ShipCity::insert([
            'city_name' => $request->city_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function cityEdit($id)
    {
        $city = ShipCity::findOrFail($id);
        return view('backend.ship.city.edit-city', compact('city'));
    }

    public function cityUpdate(Request $request, $id)
    {
        ShipCity::findOrFail($id)->update([
            'city_name' => $request->city_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        ];

        return redirect()->route('city.manage')->with($notification);
    }

    public function cityDelete($id)
    {
        ShipCity::findOrFail($id)->delete();
        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }

    public function districtView()
    {
        $citys = ShipCity::orderBy('city_name', 'ASC')->get();
        $districts = ShipDistrict::with('city')->orderBy('id', 'DESC')->get();
        return view('backend.ship.district.view-district', compact('citys', 'districts'));
    }

    public function districtStore(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'district_name' => 'required',
        ]);

        ShipDistrict::insert([
            'city_id' => $request->city_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function districtEdit($id)
    {
        $citys = ShipCity::orderBy('city_name', 'ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit-district', compact('citys', 'district'));
    }

    public function districtUpdate(Request $request, $id)
    {
        ShipDistrict::findOrFail($id)->update([
            'city_id' => $request->city_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        ];

        return redirect()->route('district.manage')->with($notification);
    }

    public function districtDelete($id)
    {
        ShipDistrict::findOrFail($id)->delete();

        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    public function wardView()
    {
        $city = ShipCity::orderBy('city_name', 'ASC')->get();
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $ward = ShipWards::with('city', 'district')->orderBy('id', 'DESC')->get();;
        return view('backend.ship.ward.view-ward', compact('city', 'district', 'ward'));
    }

    public function wardStore(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_name' => 'required',
        ]);

        ShipWards::insert([
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'ward_name' => $request->ward_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function wardEdit($id)
    {
        $city = ShipCity::orderBy('city_name', 'ASC')->get();
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $ward = ShipWards::findOrFail($id);
        return view('backend.ship.ward.edit-ward', compact('city', 'district', 'ward'));
    }

    public function wardUpdate(Request $request, $id)
    {

        ShipWards::findOrFail($id)->update([
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'ward_name' => $request->ward_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        );

        return redirect()->route('ward.manage')->with($notification);
    }

    public function wardDelete($id)
    {
        ShipWards::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
