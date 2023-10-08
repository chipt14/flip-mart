@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chỉnh sửa</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('ward.update', $ward->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Tỉnh/thành phố<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="city_id" class="form-control">
                                                <option value="" selected="" disabled="">Lựa chọn
                                                </option>
                                                @foreach ($city as $cit)
                                                    <option value="{{ $cit->id }}"
                                                        {{ $cit->id == $ward->city_id ? 'selected' : '' }}>
                                                        {{ $cit->city_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Quận/huyện<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="district_id" class="form-control">
                                                <option value="" selected="" disabled="">Lựa chọn
                                                </option>
                                                @foreach ($district as $dis)
                                                    <option value="{{ $dis->id }}"
                                                        {{ $dis->id == $ward->district_id ? 'selected' : '' }}>
                                                        {{ $dis->district_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Xã/phường<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="ward_name" class="form-control"
                                                value="{{ $ward->ward_name }}">
                                            @error('ward_name ')
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
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
