@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Đánh giá đã duyệt</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Bản tóm tắt </th>
                                            <th>Bình luận </th>
                                            <th>Người dùng </th>
                                            <th>Sản phẩm </th>
                                            <th>Trạng thái </th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($review as $item)
                                            <tr>
                                                <td> {{ $item->summary }} </td>
                                                <td> {{ $item->comment }} </td>
                                                <td> {{ $item->user->name }} </td>
                                                <td> {{ $item->product->product_name }} </td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        <span class="badge badge-pill badge-primary">Chờ duyệt </span>
                                                    @elseif($item->status == 1)
                                                        <span class="badge badge-pill badge-success">Đã duyệt </span>
                                                    @endif

                                                </td>
                                                <td width="25%">
                                                    <a href="{{ route('delete.review', $item->id) }}" class="btn btn-danger"
                                                        id="delete">Xóa </a>
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
