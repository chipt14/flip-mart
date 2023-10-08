<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subCategoryView()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory-view', compact('subcategories', 'categories'));
    }

    public function subCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ], [
            'category_id.required' => 'Phải chọn danh mục',
            'subcategory_name.required' => 'Phải nhập tên',

        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),

        ]);

        $notification = [
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function subCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory-edit', compact('subcategory', 'categories'));
    }

    public function subCategoryUpdate(Request $request)
    {
        $subcat_id = $request->id;
        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = [
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        ];

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function subCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();
        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    // ----------------------------SubSubCategory------------------------------------
    public function subSubCategoryView()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.category.subsubcategory-view', compact('subsubcategories', 'categories'));
    }

    public function getSubCategoryView($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($subcat);
    }

    public function getSubSubCategoryView($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name', 'ASC')->get();
        return json_encode($subsubcat);
    }

    public function subSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name' => 'required',
        ], [
            'category_id.required' => 'Chọn danh mục',
            'subsubcategory_name.required' => 'Nhập tên',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower(str_replace(' ', '-', $request->subsubcategory_name)),

        ]);

        $notification = [
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function subSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('backend.category.subsubcategory-edit', compact('subsubcategory', 'subcategories', 'categories'));
    }

    public function SubSubCategoryUpdate(Request $request)
    {
        $subsubcat_id = $request->id;
        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower(str_replace(' ', '-', $request->subsubcategory_name)),
        ]);

        $notification = [
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        ];

        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function subSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();
        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
