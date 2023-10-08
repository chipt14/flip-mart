@extends('admin.admin-master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách<span class="badge badge-pill badge-danger"> {{ count($subsubcategories) }} </span></h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Danh mục</th>
                                            <th>Danh mục nhỏ</th>
                                            <th>Danh mục nhỏ hơn</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subsubcategories as $item)
                                            <tr>
                                                <td>{{ $item['category']['category_name'] }}</td>
                                                <td>{{ $item['subcategory']['subcategory_name'] }}</td>
                                                <td>{{ $item->subsubcategory_name }}</td>
                                                <td width="30%">
                                                    <a href="{{ route('subsubcategory.edit', $item->id) }}"
                                                        class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('subsubcategory.delete', $item->id) }}"
                                                        class="btn btn-danger" title="Delete Data" id="delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <!-- -----------------Add SubSubCategory Page---------------------- -->
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm mới</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('subsubcategory.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Danh mục<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="" selected="" disabled="">Lựa chọn danh mục
                                                </option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
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
                                                <option value="" selected="" disabled="">Lựa chọn danh mục
                                                </option>
                                            </select>
                                            @error('subcategory_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Danh mục nhỏ hơn<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name" class="form-control">
                                            @error('subsubcategory_name')
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
