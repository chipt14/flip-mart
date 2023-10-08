@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tỉnh/thành phố</th>
                                            <th>Quận/huyện</th>
                                            <th>Xã phường</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ward as $item)
                                            <tr>
                                                <td> {{ $item->city->city_name }} </td>
                                                <td> {{ $item->district->district_name }} </td>
                                                <td> {{ $item->ward_name }} </td>
                                                <td width="40%">
                                                    <a href="{{ route('ward.edit', $item->id) }}" class="btn btn-info"
                                                        title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('ward.delete', $item->id) }}"
                                                        class="btn btn-danger" title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <!--   ------------ Add ward Page -------- -->
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm mới</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('ward.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Tỉnh/thành phố<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="city_id" class="form-control">
                                                <option value="" selected="" disabled="">Lựa chọn
                                                </option>
                                                @foreach ($city as $cit)
                                                    <option value="{{ $cit->id }}">{{ $cit->city_name }}</option>
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
                                                    <option value="{{ $dis->id }}">{{ $dis->district_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Xã phường<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="ward_name" class="form-control">
                                            @error('ward_name ')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Thêm mới">
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
