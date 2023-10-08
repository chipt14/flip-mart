@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách<span class="badge badge-pill badge-danger">
                                    {{ count($blogcategory) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Danh mục</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogcategory as $item)
                                            <tr>
                                                <td>{{ $item->blog_category_name }}</td>
                                                <td>
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
                <!--   ------------ Add Blog Category Page -------- -->
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm mới</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('blogcategory.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Danh mục<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name" class="form-control">
                                            @error('blog_category_name')
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
