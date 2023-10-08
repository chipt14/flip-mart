@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách<span class="badge badge-pill badge-danger"> {{ count($users) }}
                                </span> </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ảnh </th>
                                            <th>Tên </th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><img src="{{ !empty($user->profile_photo_path) ? url('upload/user-images/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                        style="width: 50px; height: 50px;"> </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    @if ($user->userOnline())
                                                        <span class="badge badge-pill badge-success">Đang hoạt động</span>
                                                    @else
                                                        <span
                                                            class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href=" " class="btn btn-info" title="Sửa"><i
                                                            class="fa fa-pencil"></i> </a>
                                                    <a href=" " class="btn btn-danger" title="Xóa"
                                                        id="delete">
                                                        <i class="fa fa-trash"></i></a>
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
