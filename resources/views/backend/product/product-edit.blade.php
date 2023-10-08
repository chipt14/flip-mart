@extends('admin.admin-master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Chỉnh sửa</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('product.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Thương hiệu<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control" required>
                                                            <option value="" selected="" disabled="">Lựa chọn thương hiệu</option>
                                                            @foreach ($brands as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $product->brand_id ? 'selected' : '' }}>
                                                                    {{ $item->brand_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Danh mục<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control" required>
                                                            <option value="" selected="" disabled="">Lựa chọn danh mục</option>
                                                            @foreach ($categories as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                                                    {{ $item->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Danh mục nhỏ<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control" required>
                                                            <option value="" selected="" disabled="">Lựa chọn danh mục</option>
                                                            @foreach ($subcategories as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $product->subcategory_id ? 'selected' : '' }}>
                                                                    {{ $item->subcategory_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('subcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Danh mục nhỏ hơn<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" class="form-control" required>
                                                            <option value="" selected="" disabled="">Lựa chọn danh mục</option>
                                                            @foreach ($subsubcategories as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $product->subsubcategory_id ? 'selected' : '' }}>
                                                                    {{ $item->subsubcategory_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('subsubcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Tên<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name"
                                                            value="{{ $product->product_name }}" class="form-control"
                                                            required>
                                                        @error('product_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mã<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code"
                                                            value="{{ $product->product_code }}" class="form-control"
                                                            required>
                                                        @error('product_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Tags<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags" class="form-control"
                                                            value="{{ $product->product_tags }}" data-role="tagsinput"
                                                            required>
                                                        @error('product_tags')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Size<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size" class="form-control"
                                                            value="{{ $product->product_size }}" data-role="tagsinput"
                                                            required>
                                                        @error('product_size')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Màu sắc<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color" class="form-control"
                                                            value="{{ $product->product_color }}" data-role="tagsinput"
                                                            required>
                                                        @error('product_color')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Số lượng<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty"
                                                            value="{{ $product->product_qty }}" class="form-control"
                                                            required>
                                                        @error('product_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Giá bán<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price"
                                                            value="{{ $product->selling_price }}" class="form-control"
                                                            required>
                                                        @error('selling_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Giá giảm<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price"
                                                            value="{{ $product->discount_price }}" class="form-control">
                                                        @error('discount_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Giới thiệu<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="short_descp" rows="10" cols="80" required>
                                                    {!! $product->short_descp !!}
                                                    </textarea>
                                                        @error('short_descp')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Chi tiết sản phẩm<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="long_descp" rows="10" cols="80" required>
                                                    {!! $product->long_descp !!}
                                                    </textarea>
                                                        @error('long_descp')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                        value="1" {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_2">Ưu đãi lớn</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $product->featured == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_3">Sản phẩm nổi bật</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="featured" value="1" {{ $product->product_new == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Sản phẩm mới</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- --------------------Multiple Image----------------------- -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title"><strong>Nhiều hình ảnh</strong></h4>
                    </div>
                    <form action="{{ route('product.image.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            @foreach ($multiImgs as $img)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ $img->photo_name }}" class="card-img-top"
                                            style="height: 130px; width: 280px;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('product.multiimg.delete', $img->id) }}"
                                                    class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i
                                                        class="fa fa-trash"></i></a>
                                            </h5>
                                            <div class="form-group">
                                                <label class="form-control-label">Thay đổi ảnh<span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="file"
                                                    name="multi_img[{{ $img->id }}]">
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Cập nhật">
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- --------------------Thambnail Image----------------------- -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title"><strong>Hình ảnh</strong></h4>
                    </div>
                    <form action="{{ route('product.thambnail.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="old_img" value="{{ $product->product_thambnail }}">
                        <div class="row row-sm">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ $product->product_thambnail }}" class="card-img-top"
                                        style="height: 130px; width: 280px;">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Đổi hình ảnh<span
                                                    class="tx-danger">*</span></label>
                                            <input type="file" name="product_thambnail" class="form-control"
                                                onchange="mainThamUrl(this)" required>
                                            <img src="" id="mainThmb">
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Cập nhật">
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('select[name = "category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name = "subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name = "subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name = "subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name = "subsubcategory_id"]').html('');
                            var d = $('select[name = "subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name = "subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

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

    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                    img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
