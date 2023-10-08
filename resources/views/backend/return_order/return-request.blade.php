@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách đơn hàng trả lại</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ngày </th>
                                            <th>Hóa đơn </th>
                                            <th>Tổng cộng </th>
                                            <th>Phương thức </th>
                                            <th>Trạng thái </th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td> {{ $item->order_date }} </td>
                                                <td> {{ $item->invoice_no }} </td>
                                                <td> {{ number_format($item->amount) }}₫ </td>
                                                <td> {{ $item->payment_method }} </td>
                                                <td>
                                                    @if ($item->return_order == 1)
                                                        <span class="badge badge-pill badge-primary">Chờ xử lý</span>
                                                    @elseif($item->return_order == 2)
                                                        <span class="badge badge-pill badge-success">Thành công </span>
                                                    @endif
                                                </td>
                                                <td width="25%">
                                                    <a href="{{ route('return.approve', $item->id) }}"
                                                        class="btn btn-danger">Chấp thuận </a>
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
