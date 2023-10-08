<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Coupon;
use App\Models\ShipCity;
use App\Models\ShipDistrict;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);

        if ($product->discount_price == null) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => ($product->selling_price),
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size
                ]
            ]);
            return response()->json(['success' => 'Thêm vào giỏ hàng thành công']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => ($product->discount_price),
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size
                ]
            ]);
            return response()->json(['success' => 'Thêm vào giỏ hàng thành công']);
        }
    }

    public function addMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = round(Cart::total());
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function removeMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Đã xóa sản phẩm']);
    }

    public function addToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Đã thêm thành công vào danh sách yêu thích của bạn']);
            } else {
                return response()->json(['error' => 'Sản phẩm này đã có trong danh sách yêu thích của bạn']);
            }
        } else {
            return response()->json(['error' => 'Bạn cần đăng nhập để thực hiện chức năng này']);
        }
    }

    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => Cart::total() * $coupon->coupon_discount / 100,
                'total_amount' => Cart::total() - Cart::total() * $coupon->coupon_discount / 100,
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'Mã giảm giá được áp dụng thành công'
            ));
        } else {
            return response()->json(['error' => 'Mã giảm giá không hợp lệ']);
        }
    }

    public function couponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }

    }

    public function couponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Xóa mã giảm giá thành công']);
    }

    public function checkoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $citys = ShipCity::orderBy('city_name', 'ASC')->get();
                return view('frontend.checkout.checkout-view', compact('carts', 'cartQty', 'cartTotal', 'citys'));
            } else {
                $notification = array(
                    'message' => 'Bạn cần mua ít nhất 1 sản phẩm',
                    'alert-type' => 'error',
                );
                return redirect()->to('/')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Bạn cần phải đăng nhập',
                'alert-type' => 'error',
            );
            return redirect()->route('login')->with($notification);
        }
    }
}
