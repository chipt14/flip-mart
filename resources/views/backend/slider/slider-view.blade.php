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
                                            <th>Ảnh</th>
                                            <th>Danh mục</th>
                                            <th>Mô tả</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ $item->slider_img }}" style="width: 70px; height: 40px;">
                                                </td>
                                                <td>
                                                    @if ($item->title == null)
                                                        <span class="badge badge-pill badge-danger">Notitle</span>
                                                    @else
                                                        <span>{{ $item->title }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->description }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td width="30%">
                                                    <a href="{{ route('slider.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm" title="Edit Data"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('slider.delete', $item->id) }}"
                                                        class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i
                                                            class="fa fa-trash"></i></a>
                                                    @if ($item->status == 1)
                                                        <a href="{{ route('slider.inactive', $item->id) }}"
                                                            class="btn btn-danger btn-sm" title="Inactive Now"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ route('slider.active', $item->id) }}"
                                                            class="btn btn-success btn-sm" title="Active Now"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -----------------Add Slider---------------------- -->
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm mới</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Slider Title<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Mô tả<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Ảnh<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control">
                                            @error('slider_img')
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
