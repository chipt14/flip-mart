@extends('frontend.main-master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Đăng nhập</h4>
                        <p class="">Xin chào, Chào mừng bạn đến với tài khoản của bạn.</p>
                        <div class="social-sign-in outer-top-xs" style="padding-bottom: 15px">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with
                                Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>
                        <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                                <input type="text" id="email" name="email"
                                    class="form-control unicase-form-control text-input">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
                                <input type="password" id="password" name="password"
                                    class="form-control unicase-form-control text-input" id="exampleInputPassword1">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember
                                    me!
                                </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Quên mật
                                    khẩu?</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập</button>
                        </form>
                    </div>
                    <!-- Sign-in -->
                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Tạo tài khoản mới</h4>
                        <p class="text title-tag-line">Tạo tài khoản mới của bạn.</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Họ tên <span>*</span></label>
                                <input type="text" id="name" name="name"
                                    class="form-control unicase-form-control text-input">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email<span>*</span></label>
                                <input type="email" id="email" name="email"
                                    class="form-control unicase-form-control text-input">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Số điện thoại <span>*</span></label>
                                <input type="text" id="phone" name="phone"
                                    class="form-control unicase-form-control text-input">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Mật khẩu <span>*</span></label>
                                <input type="password" id="password" name="password"
                                    class="form-control unicase-form-control text-input">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Xác nhận mật khẩu <span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control unicase-form-control text-input">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">đăng ký</button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            @include('frontend.body.brand')
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
