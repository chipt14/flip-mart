<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\BlogPost;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', null)->orderBy('id', 'DESC')->limit(3)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();
        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->get();
        $brands = Brand::orderBy('brand_name', 'ASC')->get();
        $brandProduct = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->get();
        $blogpost = BlogPost::latest()->get();
        return view('frontend.index', compact(
            'categories',
            'sliders',
            'products',
            'featured',
            'hot_deals',
            'skip_category_0',
            'skip_product_0',
            'skip_category_1',
            'skip_product_1',
            'brands',
            'brandProduct',
            'blogpost'
        ));
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user-profile', compact('user'));
    }

    public function userProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user-images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user-images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = [
            'message' => 'Cập nhật thông tin thành công',
            'alert-type' => 'success'
        ];

        return redirect()->route('dashboard')->with($notification);
    }

    public function userChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change-password', compact('user'));
    }

    public function userPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required | confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    }

    public function productDetails($id, $slug)
    {
        $product = Product::findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);
        $size = $product->product_size;
        $product_size = explode(',', $size);
        $multiImg = MultiImg::where('product_id', $id)->get();
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();
        return view('frontend.product.product-details', compact('product', 'multiImg', 'product_color', 'product_size', 'relatedProduct'));
    }

    public function tagWiseProduct($tag)
    {
        $products = Product::where('status', 1)->where('product_tags', $tag)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('frontend.tag.tags-view', compact('products', 'categories'));
    }

    public function subCatWiseProduct($subcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $breadsubcat = SubCategory::with(['category'])->where('id', $subcat_id)->get();
		return view('frontend.product.subcategory-view', compact('products', 'categories', 'breadsubcat'));
    }

    public function subSubCatWiseProduct($subsubcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id', $subsubcat_id)->get();
		return view('frontend.product.subsubcategory-view', compact('products', 'categories', 'breadsubsubcat'));
    }

    public function productViewAjax($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);
        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }

    public function productSearch(Request $request)
    {
        $request->validate(["search" => "required"]);
        $item = $request->search;
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $products = Product::where('product_name', 'LIKE', "%$item%")->get();
        return view('frontend.product.search', compact('products', 'categories'));
    }

    public function searchProduct(Request $request)
    {
        $request->validate(["search" => "required"]);
		$item = $request->search;
		$products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_thambnail','selling_price','id','product_slug')->limit(5)->get();
		return view('frontend.product.search-product', compact('products'));
    }
}
