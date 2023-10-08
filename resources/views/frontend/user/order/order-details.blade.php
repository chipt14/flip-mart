@extends('frontend.main-master')
@section('content')
    <br>
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user-sidebar')
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chi tiết vận chuyển</h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> Tên : </th>
                                    <th> {{ $order->name }} </th>
                                </tr>
                                <tr>
                                    <th> Số điện thoại : </th>
                                    <th> {{ $order->phone }} </th>
                                </tr>
                                <tr>
                                    <th> Email : </th>
                                    <th> {{ $order->email }} </th>
                                </tr>
                                <tr>
                                    <th> Tỉnh/thành phố : </th>
                                    <th> {{ $order->city->city_name }} </th>
                                </tr>
                                <tr>
                                    <th> Quận/huyện : </th>
                                    <th> {{ $order->district->district_name }} </th>
                                </tr>
                                <tr>
                                    <th> Xã/phường : </th>
                                    <th>{{ $order->ward->ward_name }} </th>
                                </tr>
                                <tr>
                                    <th> Ghi chú : </th>
                                    <th>{{ $order->notes }} </th>
                                </tr>
                                <tr>
                                    <th> Ngày đặt : </th>
                                    <th> {{ $order->order_date }} </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> <!-- // end col md -5 -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chi tiết đặt hàng
                                <span class="text-danger"> - hóa đơn : {{ $order->invoice_no }}</span>
                            </h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> Tên : </th>
                                    <th> {{ $order->user->name }} </th>
                                </tr>
                                <tr>
                                    <th> Số điện thoại : </th>
                                    <th> {{ $order->user->phone }} </th>
                                </tr>
                                <tr>
                                    <th> Hình thức thanh toán : </th>
                                    <th> {{ $order->payment_method }} </th>
                                </tr>
                                <tr>
                                    <th> Hóa đơn : </th>
                                    <th class="text-danger"> {{ $order->invoice_no }} </th>
                                </tr>
                                <tr>
                                    <th> Tổng tiền : </th>
                                    <th>{{ number_format($order->amount) }}₫ </th>
                                </tr>
                                <tr>
                                    <th> Trạng thái : </th>
                                    <th>
                                        @if ($order->status == 'pending')
                                            <span class="badge badge-pill badge-warning" style="background: #800080;"> Chờ
                                                xác nhận </span>
                                        @elseif($order->status == 'confirm')
                                            <span class="badge badge-pill badge-warning" style="background: #0000FF;"> Xác
                                                nhận </span>
                                        @elseif($order->status == 'processing')
                                            <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Đang
                                                xử lý </span>
                                        @elseif($order->status == 'picked')
                                            <span class="badge badge-pill badge-warning" style="background: #808000;"> Đóng
                                                hàng thành công </span>
                                        @elseif($order->status == 'shipped')
                                            <span class="badge badge-pill badge-warning" style="background: #808080;"> Đã
                                                vận chuyển </span>
                                        @elseif($order->status == 'delivered')
                                            <span class="badge badge-pill badge-warning" style="background: #008000;"> Đã
                                                giao hàng </span>
                                        @endif
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> <!-- // 2ND end col md -5 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr style="background: #e2e2e2;">
                                        <th class="col-md-2 text-center">
                                            <label for=""> Ảnh</label>
                                        </th>
                                        <th class="col-md-2 text-center">
                                            <label for=""> Tên </label>
                                        </th>
                                        <th class="col-md-2 text-center">
                                            <label for=""> Mã</label>
                                        </th>
                                        <th class="col-md-1 text-center">
                                            <label for=""> Màu </label>
                                        </th>
                                        <th class="col-md-1 text-center">
                                            <label for=""> Size </label>
                                        </th>
                                        <th class="col-md-1 text-center">
                                            <label for=""> Số lượng </label>
                                        </th>
                                        <th class="col-md-3 text-center">
                                            <label for=""> Giá </label>
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($orderItem as $item)
                                    <tbody>
                                        <tr>
                                            <td class="col-md-2 text-center">
                                                <label for=""><img
                                                        src="{{ asset($item->product->product_thambnail) }}" height="50px;"
                                                        width="50px;"> </label>
                                            </td>
                                            <td class="col-md-2 text-center">
                                                <label for=""> {{ $item->product->product_name }}</label>
                                            </td>
                                            <td class="col-md-2 text-center">
                                                <label for=""> {{ $item->product->product_code }}</label>
                                            </td>
                                            <td class="col-md-1 text-center">
                                                <label for=""> {{ $item->color }}</label>
                                            </td>
                                            <td class="col-md-1 text-center">
                                                <label for=""> {{ $item->size }}</label>
                                            </td>
                                            <td class="col-md-1 text-center">
                                                <label for=""> {{ $item->qty }}</label>
                                            </td>
                                            <td class="col-md-3 text-center">
                                                <label for=""> {{ number_format($item->price) }}₫ (
                                                    {{ number_format($item->price * $item->qty) }}₫ ) </label>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- / end col md 8 -->
                </div> <!-- // END ORDER ITEM ROW -->
                @if ($order->status !== 'delivered')
                @else
                    @php
                        $order = App\Models\Order::where('id', $order->id)
                            ->where('return_reason', '=', null)
                            ->first();
                    @endphp

                    @if ($order)
                        <form action="{{ route('return.order', $order->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="label"> Lý do trả hàng:</label>
                                <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Lý do</textarea>
                            </div>
                            <button type="submit" class="btn btn-danger" style="margin-bottom: 10px">Gửi</button>
                        </form>
                    @else
                        <span class="badge badge-pill badge-warning" style="background: red; margin-bottom: 10px;">Bạn đã
                            gửi yêu cầu trả lại sản phẩm này</span>
                    @endif
                @endif
            </div> <!-- // end row -->
        </div>
    </div>
@endsection
