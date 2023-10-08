<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class SliderController extends Controller
{
    public function sliderView()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider-view', compact('sliders'));
    }

    public function sliderStore(Request $request)
    {
        $request->validate([
            'slider_img' => 'required',
        ], [
            'slider_img.required' => 'Phải chọn ảnh',
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
        $save_url = 'upload/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
        ]);

        $notification = [
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function sliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider-edit', compact('slider'));
    }

    public function sliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_img')) {
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,

            ]);

            $notification = [
                'message' => 'Cập nhật thành công',
                'alert-type' => 'info'
            ];

            return redirect()->route('slider.manage')->with($notification);

        } else {
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $notification = [
                'message' => 'Cập nhật thành công',
                'alert-type' => 'info'
            ];

            return redirect()->route('slider.manage')->with($notification);
        }
    }

    public function SliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img;
        unlink($img);
        Slider::findOrFail($id)->delete();

        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    public function sliderInactive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Ẩn thành công',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    public function sliderActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Hiển thị thành công',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
