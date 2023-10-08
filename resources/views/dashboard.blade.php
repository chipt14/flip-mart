@extends('frontend.main-master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">

            @include('frontend.common.user-sidebar')

            <div class="col-md-2">

            </div> <!-- // end col md 2 -->

            <div class="col-md-6">

            <div class="card">
                <h3 class="text-center">
                    <span class="text-danger"></span>

                    Chào mừng <strong>{{ $user->name }}</strong> bạn đến với Flipmart
                </h3>
            </div>
            </div> <!-- // end col md 2 -->
        </div> <!-- // end row -->
    </div>
</div>

@endsection