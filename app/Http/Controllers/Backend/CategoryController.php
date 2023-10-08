<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category-view', compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name.required' => 'Phải nhập tên',
            'category_icon.required' => 'Phải nhập icon',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_icon' => $request->category_icon,

        ]);

        $notification = [
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category-edit', compact('category'));
    }

    public function categoryUpdate(Request $request)
    {
        $cat_id = $request->id;
        Category::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_icon' => $request->category_icon,

        ]);

        $notification = [
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        ];

        return redirect()->route('all.category')->with($notification);

    }

    public function categoryDelete($id)
    {
        Category::findOrFail($id)->delete();
        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
