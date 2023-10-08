@extends('frontend.main-master')
@section('content')
@section('title')
    Giỏ hàng
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>MyCart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-image item">Ảnh</th>
                                    <th class="cart-product-name item">Tên và giá</th>
                                    <th class="cart-color item">Màu sắc</th>
                                    <th class="cart-size item">Size</th>
                                    <th class="cart-qty item item">Số lượng</th>
                                    <th class="cart-sub-total">Tổng tiền</th>
                                    <th class="cart-romove item">Xóa</th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody id="cartPage" class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                </div>

                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    @if (Session::has('coupon'))

                    @else
                        <table class="table" id="couponField">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Mã phiếu giảm giá</span>
                                        <p>Nhập mã phiếu giảm giá của bạn nếu bạn có..</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                placeholder="Mã giảm giá" id="coupon_name">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">áp dụng</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    @endif
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead id="couponCalField">

                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{ route('checkout') }}" type="submit"
                                            class="btn btn-primary checkout-btn">ĐẶT HÀNG</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->

            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        @include('frontend.body.brand')
    </div><!-- /.container -->
</div><!-- /.body-content -->
<br>
@endsection
