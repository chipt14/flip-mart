@extends('frontend.main-master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title')
    Thanh toán tiền mặt
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Tiền mặt</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-6">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Số tiền mua sắm của bạn</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <hr>
                                        <li>
                                            @if (Session::has('coupon'))
                                                <Strong>Tổng cộng: </Strong> {{ number_format($cartTotal) }}₫
                                                <hr>
                                                <Strong>Mã giảm giá: </Strong>
                                                {{ session()->get('coupon')['coupon_name'] }}
                                                ({{ session()->get('coupon')['coupon_discount'] }}%)
                                                <hr>
                                                <Strong>Chiết khấu: </Strong>
                                                {{ number_format(session()->get('coupon')['discount_amount']) }}₫
                                                <hr>
                                                <Strong>Tiền thanh toán: </Strong>
                                                {{ number_format(session()->get('coupon')['total_amount']) }}₫
                                                <hr>
                                            @else
                                                <Strong>Tổng cộng: </Strong> {{ number_format($cartTotal) }}₫
                                                <hr>
                                                <Strong>Tiền thanh toán: </Strong> {{ number_format($cartTotal) }}₫
                                                <hr>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Phương thức thanh toán</h4>
                                </div>
                                <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                                    @csrf
                                    <div class="form-row">
                                        <img src="frontend/assets/images/payments/cash.png" alt="">
                                        <label for="card-element">
                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="city_id"
                                                value="{{ $data['city_id'] }}">
                                            <input type="hidden" name="district_id"
                                                value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="ward_id"
                                                value="{{ $data['ward_id'] }}">
                                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                        </label>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Hoàn thành</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
