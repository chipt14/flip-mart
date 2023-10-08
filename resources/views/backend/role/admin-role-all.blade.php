@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách quản trị viên</h3>
                            <a href="{{ route('admin.user.add') }}" class="btn btn-danger" style="float: right;">Thêm mới</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ảnh </th>
                                            <th>Tên </th>
                                            <th>Email </th>
                                            <th>Quyền truy cập </th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adminuser as $item)
                                            <tr>
                                                <td> <img src="{{ $item->profile_photo_path }}"
                                                        style="width: 50px; height: 50px;"> </td>
                                                <td> {{ $item->name }} </td>
                                                <td> {{ $item->email }} </td>
                                                <td>
                                                    @if ($item->brand == 1)
                                                        <span class="badge btn-primary">Thương hiệu</span>
                                                    @else
                                                    @endif

                                                    @if ($item->category == 1)
                                                        <span class="badge btn-secondary">Danh mục</span>
                                                    @else
                                                    @endif

                                                    @if ($item->product == 1)
                                                        <span class="badge btn-success">Sản phẩm</span>
                                                    @else
                                                    @endif

                                                    @if ($item->slider == 1)
                                                        <span class="badge btn-danger">Slider</span>
                                                    @else
                                                    @endif

                                                    @if ($item->coupons == 1)
                                                        <span class="badge btn-warning">Mã giảm giá</span>
                                                    @else
                                                    @endif

                                                    @if ($item->shipping == 1)
                                                        <span class="badge btn-info">Khu vực vận chuyển</span>
                                                    @else
                                                    @endif

                                                    @if ($item->blog == 1)
                                                        <span class="badge btn-light">Blog</span>
                                                    @else
                                                    @endif

                                                    @if ($item->setting == 1)
                                                        <span class="badge btn-dark">Cài đặt</span>
                                                    @else
                                                    @endif

                                                    @if ($item->returnorder == 1)
                                                        <span class="badge btn-primary">Đơn hàng trả lại</span>
                                                    @else
                                                    @endif

                                                    @if ($item->review == 1)
                                                        <span class="badge btn-secondary">Đánh giá</span>
                                                    @else
                                                    @endif

                                                    @if ($item->orders == 1)
                                                        <span class="badge btn-success">Đơn hàng</span>
                                                    @else
                                                    @endif

                                                    @if ($item->stock == 1)
                                                        <span class="badge btn-danger">Kho sản phẩm</span>
                                                    @else
                                                    @endif

                                                    @if ($item->reports == 1)
                                                        <span class="badge btn-warning">Tìm kiếm</span>
                                                    @else
                                                    @endif

                                                    @if ($item->alluser == 1)
                                                        <span class="badge btn-info">Người dùng</span>
                                                    @else
                                                    @endif

                                                    @if ($item->adminuserrole == 1)
                                                        <span class="badge btn-dark">Vai trò quản trị viên</span>
                                                    @else
                                                    @endif
                                                </td>
                                                <td width="25%">
                                                    <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-info"
                                                        title="Chỉnh sửa">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('admin.user.delete', $item->id) }}"
                                                        class="btn btn-danger" title="Xóa" id="delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
