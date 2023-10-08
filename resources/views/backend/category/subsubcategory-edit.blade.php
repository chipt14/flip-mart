@extends('admin.admin-master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                <form method="post" action="{{ route('subsubcategory.update') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $subsubcategory->id }}">
                                    <div class="form-group">
                                        <h5>Danh mục<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="" selected="" disabled="">Lựa chọn danh mục
                                                </option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $subsubcategory->category_id ? 'selected' : '' }}>
                                                        {{ $item->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Danh mục nhỏ<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control">
                                                <option value="" selected="" disabled="">Lựa chọn danh mục nhỏ
                                                </option>
                                                @foreach ($subcategories as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $subsubcategory->subcategory_id ? 'selected' : '' }}>
                                                        {{ $item->subcategory_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Danh mục nhỏ hơn<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name" class="form-control"
                                                value="{{ $subsubcategory->subsubcategory_name }}">
                                            @error('subsubcategory_name')
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
        });
    </script>
@endsection
