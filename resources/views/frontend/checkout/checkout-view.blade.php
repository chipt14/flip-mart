@extends('frontend.main-master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title')
    Thanh toán
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <h3 class="" style="padding-bottom: 15px"><b>Địa chỉ giao hàng</b></h3>
                                    <div class="row">
                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <form class="register-form" action="{{ route('checkout.store') }}"
                                                method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Họ tên
                                                            <span>*</span></b></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" name="shipping_name"
                                                        placeholder="Full name" value="{{ Auth::user()->name }}"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Email
                                                            <span>*</span></b></label>
                                                    <input type="email"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" name="shipping_email"
                                                        placeholder="Email" value="{{ Auth::user()->email }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Số điện thoại
                                                            <span>*</span></b></label>
                                                    <input type="number"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" name="shipping_phone"
                                                        placeholder="Phone" value="{{ Auth::user()->phone }}" required>
                                                </div>
                                        </div>
                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <div class="form-group">
                                                <h5><b>Tỉnh/Thành phố<span class="text-danger">*</span></b></h5>
                                                <div class="controls">
                                                    <select name="city_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Lựa chọn</option>
                                                        @foreach ($citys as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->city_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('city_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5><b>Quận/Huyện<span class="text-danger">*</span></b></h5>
                                                <div class="controls">
                                                    <select name="district_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Lựa chọn</option>
                                                    </select>
                                                    @error('district_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5><b>Xã/Phường<span class="text-danger">*</span></b></h5>
                                                <div class="controls">
                                                    <select name="ward_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Lựa chọn</option>
                                                    </select>
                                                    @error('ward_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Ghi chú</label>
                                                <textarea class="form-control" cols="30" rows="5" placeholder="Ghi chú" name="notes"></textarea>
                                            </div>
                                        </div>
                                        <!-- already-registered-login -->
                                    </div>
                                </div>
                                <!-- panel-body  -->
                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01  -->
                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Tiến trình thanh toán của bạn</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        @foreach ($carts as $item)
                                            <li>
                                                <strong>Ảnh: </strong>
                                                <img src="{{ $item->options->image }}"
                                                    style="height: 50px; width: 50px;">
                                            </li>
                                            <li>
                                                <strong>Số lượng: </strong>
                                                ({{ $item->qty }})
                                                <strong>Màu sắc: </strong>
                                                {{ $item->options->color }}
                                                <strong>Size: </strong>
                                                {{ $item->options->size }}
                                            </li>
                                        @endforeach
                                        <hr>
                                        <li>
                                            @if (Session::has('coupon'))
                                                <Strong>Tổng tiền hàng: </Strong> {{ number_format($cartTotal) }}₫
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
                                                <Strong>Tổng tiền hàng: </Strong> {{ number_format($cartTotal) }}₫
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
                    <!-- checkout-progress-sidebar -->
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Phương thức thanh toán</h4>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-6">
                                        <label for="">Thẻ</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="frontend/assets/images/payments/3.png" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Tiền mặt</label>
                                        <input type="radio" name="payment_method" value="cash">
                                        <img src="frontend/assets/images/payments/6.png" alt="">
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Hoàn thành</button>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
                </form>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<script>
    $(document).ready(function() {
        $('select[name="city_id"]').on('change', function() {
            var city_id = $(this).val();
            if (city_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + city_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="ward_id"]').empty();
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/ward-get/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="ward_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="ward_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .ward_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection
