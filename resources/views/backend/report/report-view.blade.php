@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ngày</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('search.by.date') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Chọn ngày<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control">
                                            @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Tìm kiếm">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tháng</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('search.by.month') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Chọn tháng<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="month" class="form-control">
                                                <option label="Choose One"></option>
                                                <option value="January">Tháng một</option>
                                                <option value="February">Tháng hai</option>
                                                <option value="March">Tháng ba</option>
                                                <option value="April">Tháng tư</option>
                                                <option value="May">Tháng năm</option>
                                                <option value="Jun">Tháng sáu</option>
                                                <option value="July">Tháng bảy</option>
                                                <option value="August">Tháng tám</option>
                                                <option value="September">Tháng chín</option>
                                                <option value="October">Tháng mười</option>
                                                <option value="November">Tháng mười một</option>
                                                <option value="December">Tháng mười hai</option>
                                            </select>
                                            @error('month')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Chọn năm<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year_name" class="form-control">
                                                <option label="Choose One"></option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>
                                            @error('year_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Tìm kiếm">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Năm</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('search.by.year') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Chọn năm<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year" class="form-control">
                                                <option label="Choose One"></option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>
                                            @error('year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Tìm kiếm">
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
