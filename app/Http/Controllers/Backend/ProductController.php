<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productAdd(Request $request)
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product-add', compact('categories', 'brands'));
    }

    public function productStore(Request $request)
    {
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'product_new' => $request->product_new,
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // Upload ảnh thành phần
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }

        // Kết thúc Upload ảnh thành phần
        $notification = [
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.manage')->with($notification);
    }

    public function productManage()
    {
        $products = Product::latest()->get();
        return view('backend.product.product-view', compact('products'));
    }

    public function productEdit($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        return view('backend.product.product-edit', compact('multiImgs', 'categories', 'brands', 'subcategories', 'subsubcategories', 'product'));
    }

    public function productUpdate(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'product_new' => $request->product_new,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Cập nhật thành công',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.manage')->with($notification);
    }

    public function multiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        ];
        return redirect()->route('product.manage')->with($notification);
    }

    public function thambnailUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }

    public function multiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function productInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Ẩn sản phẩm',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function productActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Hiện sản phẩm',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function productDelete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = [
            'message' => 'Xóa thành công',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function productStock()
    {
        $products = Product::latest()->get();
        return view('backend.product.product-stock', compact('products'));
    }
}
