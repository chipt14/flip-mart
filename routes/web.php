<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Models\User;


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

// User All Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);

// Xác thực quyền quản trị
Route::middleware(['auth:admin'])->group(function () {
    // Quản lý admin
    Route::prefix('admin')->group(function () {
        Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
        Route::get('/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
        Route::get('/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
        Route::post('/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
        Route::get('/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
        Route::post('/change/password', [AdminProfileController::class, 'adminUpdateChangePassword'])->name('update.change.password');
    });
    // Quản lý thương hiệu
    Route::prefix('brand')->group(function () {
        Route::get('/view', [BrandController::class, 'brandView'])->name('all.brand');
        Route::post('/store', [BrandController::class, 'brandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit');
        Route::post('/update', [BrandController::class, 'brandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete');
    });
    // Quản lý danh mục
    Route::prefix('category')->group(function () {
        Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
        Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    });
    // Quản lý danh mục nhỏ
    Route::prefix('category')->group(function () {
        Route::get('sub/view', [SubCategoryController::class, 'subCategoryView'])->name('all.subcategory');
        Route::post('sub/store', [SubCategoryController::class, 'subCategoryStore'])->name('subcategory.store');
        Route::get('sub/edit/{id}', [SubCategoryController::class, 'subCategoryEdit'])->name('subcategory.edit');
        Route::post('sub/update', [SubCategoryController::class, 'subCategoryUpdate'])->name('subcategory.update');
        Route::get('sub/delete/{id}', [SubCategoryController::class, 'subCategoryDelete'])->name('subcategory.delete');
    });
    // Quản lý danh mục nhỏ hơn
    Route::prefix('category')->group(function () {
        Route::get('sub/sub/view', [SubCategoryController::class, 'subSubCategoryView'])->name('all.subsubcategory');
        Route::get('subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategoryView']);
        Route::get('sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'getSubSubCategoryView']);
        Route::post('sub/sub/store', [SubCategoryController::class, 'subSubCategoryStore'])->name('subsubcategory.store');
        Route::get('sub/sub/edit/{id}', [SubCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit');
        Route::post('sub/sub/update', [SubCategoryController::class, 'subSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('sub/sub/delete/{id}', [SubCategoryController::class, 'subSubCategoryDelete'])->name('subsubcategory.delete');
    });
    // Quản lý sản phẩm
    Route::prefix('product')->group(function () {
        Route::get('/add', [ProductController::class, 'productAdd'])->name('product.add');
        Route::post('/store', [ProductController::class, 'productStore'])->name('product.store');
        Route::get('/manage', [ProductController::class, 'productManage'])->name('product.manage');
        Route::get('/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
        Route::post('/data/update', [ProductController::class, 'productUpdate'])->name('product.update');
        Route::post('/image/update', [ProductController::class, 'multiImageUpdate'])->name('product.image.update');
        Route::post('/thambnail/update', [ProductController::class, 'thambnailUpdate'])->name('product.thambnail.update');
        Route::get('/multiimg/delete/{id}', [ProductController::class, 'multiImageDelete'])->name('product.multiimg.delete');
        Route::get('/inactive/{id}', [ProductController::class, 'productInactive'])->name('product.inactive');
        Route::get('/active/{id}', [ProductController::class, 'productActive'])->name('product.active');
        Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
    });
    // Quản lý silder
    Route::prefix('slider')->group(function () {
        Route::get('/view', [SliderController::class, 'sliderView'])->name('slider.manage');
        Route::post('/store', [SliderController::class, 'sliderStore'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
        Route::post('/update', [SliderController::class, 'sliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');
        Route::get('/inactive/{id}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');
        Route::get('/active/{id}', [SliderController::class, 'sliderActive'])->name('slider.active');
    });
    // Quản lý mã giảm giá
    Route::prefix('coupons')->group(function () {
        Route::get('/view', [CouponController::class, 'couponView'])->name('coupon.manage');
        Route::post('/store', [CouponController::class, 'couponStore'])->name('coupon.store');
        Route::get('/edit/{id}', [CouponController::class, 'couponEdit'])->name('coupon.edit');
        Route::post('/update/{id}', [CouponController::class, 'couponUpdate'])->name('coupon.update');
        Route::get('/delete/{id}', [CouponController::class, 'couponDelete'])->name('coupon.delete');
    });
    // Quản lý kv ship
    Route::prefix('shipping')->group(function () {
        // Tỉnh/thành phố
        Route::get('/city/view', [ShippingAreaController::class, 'cityView'])->name('city.manage');
        Route::post('/city/store', [ShippingAreaController::class, 'cityStore'])->name('city.store');
        Route::get('/city/edit/{id}', [ShippingAreaController::class, 'cityEdit'])->name('city.edit');
        Route::post('/city/update/{id}', [ShippingAreaController::class, 'cityUpdate'])->name('city.update');
        Route::get('/city/delete/{id}', [ShippingAreaController::class, 'cityDelete'])->name('city.delete');
        // Quận/huyện
        Route::get('/district/view', [ShippingAreaController::class, 'districtView'])->name('district.manage');
        Route::post('/district/store', [ShippingAreaController::class, 'districtStore'])->name('district.store');
        Route::get('/district/edit/{id}', [ShippingAreaController::class, 'districtEdit'])->name('district.edit');
        Route::post('/district/update/{id}', [ShippingAreaController::class, 'districtUpdate'])->name('district.update');
        Route::get('/district/delete/{id}', [ShippingAreaController::class, 'districtDelete'])->name('district.delete');
        // Xã phường
        Route::get('/ward/view', [ShippingAreaController::class, 'wardView'])->name('ward.manage');
        Route::post('/ward/store', [ShippingAreaController::class, 'wardStore'])->name('ward.store');
        Route::get('/ward/edit/{id}', [ShippingAreaController::class, 'wardEdit'])->name('ward.edit');
        Route::post('/ward/update/{id}', [ShippingAreaController::class, 'wardUpdate'])->name('ward.update');
        Route::get('/ward/delete/{id}', [ShippingAreaController::class, 'wardDelete'])->name('ward.delete');
    });
    // Quản lý đơn hàng
    Route::prefix('orders')->group(function () {
        Route::get('/pending/oders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
        Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'pendingOrdersDetails'])->name('pending.order.details');
        Route::get('/confirmed/orders', [OrderController::class, 'confirmedOrders'])->name('confirmed-orders');
        Route::get('/processing/orders', [OrderController::class, 'processingOrders'])->name('processing-orders');
        Route::get('/picked/orders', [OrderController::class, 'pickedOrders'])->name('picked-orders');
        Route::get('/shipped/orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
        Route::get('/delivered/orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
        Route::get('/cancel/orders', [OrderController::class, 'cancelOrders'])->name('cancel-orders');
        Route::get('/pending/confirm/{order_id}', [OrderController::class, 'pendingToConfirm'])->name('pending-confirm');
        Route::get('/confirm/processing/{order_id}', [OrderController::class, 'confirmToProcessing'])->name('confirm.processing');
        Route::get('/processing/picked/{order_id}', [OrderController::class, 'processingToPicked'])->name('processing.picked');
        Route::get('/picked/shipped/{order_id}', [OrderController::class, 'pickedToShipped'])->name('picked.shipped');
        Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'shippedToDelivered'])->name('shipped.delivered');
        Route::get('/invoice/download/{order_id}', [OrderController::class, 'adminInvoiceDownload'])->name('invoice.download');
    });
    // Quản lý trả hàng
    Route::prefix('return')->group(function () {
        Route::get('/request', [ReturnController::class, 'returnRequest'])->name('return.request');
        Route::get('/approve/{order_id}', [ReturnController::class, 'returnRequestApprove'])->name('return.approve');
        Route::get('/all/request', [ReturnController::class, 'returnAllRequest'])->name('all.request');
    });
    // Quản lý báo cáo
    Route::prefix('reports')->group(function () {
        Route::get('/view', [ReportController::class, 'reportView'])->name('all.reports');
        Route::post('/search/by/date', [ReportController::class, 'reportByDate'])->name('search.by.date');
        Route::post('/search/by/month', [ReportController::class, 'reportByMonth'])->name('search.by.month');
        Route::post('/search/by/year', [ReportController::class, 'reportByYear'])->name('search.by.year');
    });
    // Quản lý user
    Route::prefix('alluser')->group(function () {
        Route::get('/view', [AdminProfileController::class, 'allUsers'])->name('all.users');
    });
    // Quản lý blog
    Route::prefix('blog')->group(function () {
        Route::get('/category', [BlogController::class, 'blogCategory'])->name('blog.category');
        Route::post('/store', [BlogController::class, 'blogCategoryStore'])->name('blogcategory.store');
        Route::get('/category/edit/{id}', [BlogController::class, 'blogCategoryEdit'])->name('blog.category.edit');
        Route::post('/update', [BlogController::class, 'blogCategoryUpdate'])->name('blogcategory.update');
        Route::get('/list/post', [BlogController::class, 'listBlogPost'])->name('list.post');
        Route::get('/add/post', [BlogController::class, 'addBlogPost'])->name('add.post');
        Route::post('/post/store', [BlogController::class, 'blogPostStore'])->name('post.store');
    });
    // Quản lý bình luận
    Route::prefix('review')->group(function () {
        Route::get('/pending', [ReviewController::class, 'pendingReview'])->name('pending.review');
        Route::get('/admin/approve/{id}', [ReviewController::class, 'reviewApprove'])->name('review.approve');
        Route::get('/admin/all/request', [ReturnController::class, 'returnAllRequest'])->name('all.request');
        Route::get('/publish', [ReviewController::class, 'publishReview'])->name('publish.review');
        Route::get('/delete/{id}', [ReviewController::class, 'deleteReview'])->name('delete.review');
    });
    // Quản lý số lượng
    Route::prefix('stock')->group(function () {
        Route::get('/product', [ProductController::class, 'productStock'])->name('product.stock');
    });
    // Quản trị viên
    Route::prefix('adminuserrole')->group(function () {
        Route::get('/all', [AdminUserController::class, 'allAdminRole'])->name('all.admin.user');
        Route::get('/add', [AdminUserController::class, 'addAdminRole'])->name('admin.user.add');
        Route::post('/store', [AdminUserController::class, 'storeAdminRole'])->name('admin.user.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'editAdminRole'])->name('admin.user.edit');
        Route::post('/update', [AdminUserController::class, 'updateAdminRole'])->name('admin.user.update');
        Route::get('/delete/{id}', [AdminUserController::class, 'deleteAdminRole'])->name('admin.user.delete');
    });
});

// Frontend
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'productDetails']);
Route::get('/product/tag/{tag}', [IndexController::class, 'tagWiseProduct']);
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'subCatWiseProduct']);
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCatWiseProduct']);
// Giỏ hàng
Route::get('/product/view/modal/{id}', [IndexController::class, 'productViewAjax']);
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);
Route::get('/product/mini/cart/', [CartController::class, 'addMiniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeMiniCart']);
// Yêu thích
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

Route::group(
    ['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'],
    function () {
        Route::get('/logout', [IndexController::class, 'userLogout'])->name('user.logout');
        Route::get('/profile', [IndexController::class, 'userProfile'])->name('user.profile');
        Route::post('/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
        Route::get('/change/password', [IndexController::class, 'userChangePassword'])->name('change.password');
        Route::post('/password/update', [IndexController::class, 'userPasswordUpdate'])->name('user.password.update');
        Route::get('/wishlist', [WishlistController::class, 'viewWishlist'])->name('wishlist');
        Route::get('/get-wishlist-product', [WishlistController::class, 'getWishlistProduct']);
        Route::get('/wishlist-remove/{id}', [WishlistController::class, 'removeWishlistProduct']);
        Route::get('/mycart', [CartPageController::class, 'myCart'])->name('mycart');
        Route::get('/get-cart-product', [CartPageController::class, 'getCartProduct']);
        Route::get('/cart-remove/{id}', [CartPageController::class, 'removeCartProduct']);
        Route::post('/stripe/order', [StripeController::class, 'stripeOrder'])->name('stripe.order');
        Route::post('/cash/order', [CashController::class, 'cashOrder'])->name('cash.order');
        Route::get('/my/orders', [AllUserController::class, 'myOrders'])->name('my.orders');
        Route::get('/order_details/{order_id}', [AllUserController::class, 'orderDetails']);
        Route::get('/invoice_download/{order_id}', [AllUserController::class, 'invoiceDownload']);
        Route::post('/return/order/{order_id}', [AllUserController::class, 'returnOrder'])->name('return.order');
        Route::get('/return/order/list', [AllUserController::class, 'returnOrderList'])->name('return.order.list');
        Route::get('/cancel/orders', [AllUserController::class, 'cancelOrders'])->name('cancel.orders');

    }
);
// Trang giỏ hàng
Route::get('/mycart', [CartPageController::class, 'myCart'])->name('mycart');
Route::get('/user/get-cart-product', [CartPageController::class, 'getCartProduct']);
Route::get('/user/cart-remove/{id}', [CartPageController::class, 'removeCartProduct']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'cartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'cartDecrement']);
// Mã giảm giá
Route::post('/coupon-apply', [CartController::class, 'couponApply']);
Route::get('/coupon-calculation', [CartController::class, 'couponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'couponRemove']);
// Thanh toán
Route::get('/checkout', [CartController::class, 'checkoutCreate'])->name('checkout');
Route::get('/district-get/ajax/{city_id}', [CheckoutController::class, 'districtGetAjax']);
Route::get('/ward-get/ajax/{district_id}', [CheckoutController::class, 'wardGetAjax']);
Route::post('/checkout/store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');
//  Blog
Route::get('/blog', [HomeBlogController::class, 'addBlogPost'])->name('home.blog');
Route::get('/post/details/{id}', [HomeBlogController::class, 'detailsBlogPost'])->name('post.details');
Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'homeBlogCatPost']);
// Bình luận
Route::post('/review/store', [ReviewController::class, 'reviewStore'])->name('review.store');
//Theo dõi đơn hàng
Route::post('/order/tracking', [AllUserController::class, 'orderTraking'])->name('order.tracking');
/// Tìm kiếm sản phẩm
Route::post('/search', [IndexController::class, 'productSearch'])->name('product.search');
// Tìm kiếm nâng cao
Route::post('/search-product', [IndexController::class, 'searchProduct']);
