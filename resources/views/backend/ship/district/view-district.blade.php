@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tỉnh/thành phố</th>
                                            <th>Quận/huyện</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($districts as $item)
                                            <tr>
                                                <td>{{ $item->city->city_name }}</td>
                                                <td>{{ $item->district_name }}</td>
                                                <td width="40%">
                                                    <a href="{{ route('district.edit', $item->id) }}" class="btn btn-info"
                                                        title="Edit Data"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('district.delete', $item->id) }}"
                                                        class="btn btn-danger" title="Delete Data" id="delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -----------------Add Category Page---------------------- -->
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm mới</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('district.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Tỉnh/thành phố<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="city_id" class="form-control">
                                                <option value="" selected="" disabled="">Lựa chọn
                                                </option>
                                                @foreach ($citys as $item)
                                                    <option value="{{ $item->id }}">{{ $item->city_name }}</option>
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
                                            <input type="text" name="district_name" class="form-control">
                                            @error('district_name')
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
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
