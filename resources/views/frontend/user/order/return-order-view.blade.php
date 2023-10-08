@extends('frontend.main-master')
@section('content')
    <br>
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user-sidebar')
                <div class="col-md-1">
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background: #e2e2e2;">
                                    <th class="col-md-2 text-center">
                                        <label for=""> Ngày</label>
                                    </th>
                                    <th class="col-md-3 text-center">
                                        <label for=""> Tổng cộng</label>
                                    </th>
                                    <th class="col-md-2 text-center">
                                        <label for=""> Phương thức</label>
                                    </th>
                                    <th class="col-md-2 text-center">
                                        <label for=""> Hóa đơn</label>
                                    </th>
                                    <th class="col-md-1 text-center">
                                        <label for=""> Lý do </label>
                                    </th>
                                    <th class="col-md-2 text-center">
                                        <label for=""> Trạng thái</label>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="col-md-2 text-center">
                                            <label for=""> {{ $order->order_date }}</label>
                                        </td>
                                        <td class="col-md-3 text-center">
                                            <label for=""> {{ number_format($order->amount) }}₫</label>
                                        </td>
                                        <td class="col-md-2 text-center">
                                            <label for=""> {{ $order->payment_method }}</label>
                                        </td>
                                        <td class="col-md-2 text-center">
                                            <label for=""> {{ $order->invoice_no }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for=""> {{ $order->return_reason }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">
                                                @if($order->return_order == 0)
                                                <span class="badge badge-pill badge-warning" style="background: #418DB9;"> Không có yêu cầu trả lại </span>
                                                @elseif($order->return_order == 1)
                                                <span class="badge badge-pill badge-warning" style="background: #800000;"> Chờ xử lý </span>
                                                @elseif($order->return_order == 2)
                                                <span class="badge badge-pill badge-warning" style="background: #008000;">Thành công </span>
                                                @endif
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- / end col md 8 -->
            </div> <!-- // end row -->
        </div>
    </div>
@endsection
