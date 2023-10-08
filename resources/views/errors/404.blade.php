@extends('frontend.main-master')
@section('content')
    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="x-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 x-text text-center">
                        <h1>404</h1>
                        <p>Chúng tôi rất tiếc, trang bạn yêu cầu không tồn tại.</p>
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Đi đến trang chủ</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
