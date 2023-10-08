<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    public function brandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand-view', compact('brands'));
    }

    public function brandStore(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name.required' => 'Phải nhập tên',
            'brand_image.required' => 'Phải chọn ảnh',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(166, 110)->save('upload/brand/' . $name_gen);
        $save_url = 'upload/brand/' . $name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            'brand_image' => $save_url,

        ]);

        $notification = [
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function brandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand-edit', compact('brand'));
    }

    public function brandUpdate(Request $request)
    {
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('brand_image')) {
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(166, 110)->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
                'brand_image' => $save_url,

            ]);

            $notification = [
                'message' => 'Cập nhật thành công',
                'alert-type' => 'info'
            ];

            return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            ]);

            $notification = [
                'message' => 'Cập nhật thành công',
                'alert-type' => 'info'
            ];

            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function brandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
