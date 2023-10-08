@extends('admin.admin-master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Thêm mới</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row"> <!-- start 2nd row  -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Tiêu đề<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title" class="form-control"
                                                            required="">
                                                        @error('post_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 6 -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Danh mục<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Lựa chọn</option>
                                                            @foreach ($blogcategory as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->blog_category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 3 -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Ảnh<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="post_image" class="form-control"
                                                            onChange="mainThamUrl(this)" required="">
                                                        @error('post_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="" id="mainThmb">
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 3 -->
                                        </div> <!-- end 2nd row  -->
                                        <div class="row"> <!-- start 8th row  -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Nội dung<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="post_details" rows="10" cols="80" required="">
                                                        nội dung bài viết...
                                                    </textarea>
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 6 -->
                                        </div> <!-- end 8th row  -->
                                        <hr>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Thêm mới">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
