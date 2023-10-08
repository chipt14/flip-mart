@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Bài viết<span class="badge badge-pill badge-danger">
                                    {{ count($blogpost) }} </span></h3>
                            <a href="{{ route('add.post') }}" class="btn btn-success" style="float: right;">Thêm mới</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Danh mục</th>
                                            <th>Ảnh</th>
                                            <th>Tiêu đề</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogpost as $item)
                                            <tr>
                                                <td>{{ $item->category->blog_category_name }}</td>
                                                <td> <img src="{{ $item->post_image }}" style="width: 60px; height: 60px;">
                                                </td>
                                                <td>{{ $item->post_title }}</td>
                                                <td width="20%">
                                                    <a href="{{ route('blog.category.edit', $item->id) }}"
                                                        class="btn btn-info" title="Chỉnh sửa"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('category.delete', $item->id) }}"
                                                        class="btn btn-danger" title="Xóa" id="delete">
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
