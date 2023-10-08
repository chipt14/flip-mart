@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <!-- -----------------Edit Coupon Page---------------------- -->
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chỉnh sửa</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('coupon.update', $coupon->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Mã<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_name" class="form-control"
                                                value="{{ $coupon->coupon_name }}">
                                            @error('coupon_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Giảm giá(%)<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_discount" class="form-control"
                                                value="{{ $coupon->coupon_discount }}">
                                            @error('coupon_discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Ngày hiệu lực<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="coupon_validity" class="form-control"
                                                min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                value="{{ $coupon->coupon_validity }}">
                                            @error('coupon_validity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Cập nhật">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
