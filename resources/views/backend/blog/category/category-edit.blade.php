@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chỉnh sửa</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('blogcategory.update') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $blogcategory->id }}">
                                    <div class="form-group">
                                        <h5>Danh mục<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name" class="form-control"
                                                value="{{ $blogcategory->blog_category_name }}">
                                            @error('blog_category_name')
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
