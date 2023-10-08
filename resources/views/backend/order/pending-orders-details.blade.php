@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Chi tiết đặt hàng</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Chi tiết đặt hàng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Thông tin vận chuyển</strong> </h4>
                        </div>
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
                                <th> {{ $order->notes }} </th>
                            </tr>
                            <tr>
                                <th> Ngày đặt : </th>
                                <th> {{ $order->order_date }} </th>
                            </tr>
                        </table>
                    </div>
                </div> <!--  // cod md -6 -->
                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Chi tiết đặt hàng -</strong><span class="text-danger"> Hóa đơn :
                                    {{ $order->invoice_no }}</span></h4>
                        </div>
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
                                <th> Phương thức : </th>
                                <th> {{ $order->payment_method }} </th>
                            </tr>
                            <tr>
                                <th> Hóa đơn : </th>
                                <th class="text-danger"> {{ $order->invoice_no }} </th>
                            </tr>
                            <tr>
                                <th> Tổng cộng : </th>
                                <th>{{ number_format($order->amount) }}₫ </th>
                            </tr>
                            <tr>
                                <th> Trạng thái : </th>
                                <th>
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #418DB9;">{{ $order->status }} </span>
                                </th>
                            </tr>
                            <tr>
                                <th> </th>
                                <th>
                                    @if($order->status == 'pending')
                                    <a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Xác nhận đơn hàng</a>
                                    @elseif($order->status == 'confirm')
                                    <a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-block btn-success" id="processing">Xử lý đơn hàng</a>
                                    @elseif($order->status == 'processing')
                                    <a href="{{ route('processing.picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Đã đóng hàng</a>
                                    @elseif($order->status == 'picked')
                                    <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Đã vận chuyển</a>
                                    @elseif($order->status == 'shipped')
                                    <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Đã giao hàng</a>
                                    @endif
                                </th>
                        </table>
                    </div>
                </div> <!--  // cod md -6 -->
                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="10%">
                                        <label for=""> Ảnh</label>
                                    </td>
                                    <td width="20%">
                                        <label for=""> Tên </label>
                                    </td>
                                    <td width="10%">
                                        <label for=""> Mã</label>
                                    </td>
                                    <td width="10%">
                                        <label for=""> Màu </label>
                                    </td>
                                    <td width="10%">
                                        <label for=""> Size </label>
                                    </td>
                                    <td width="10%">
                                        <label for=""> Số lượng </label>
                                    </td>
                                    <td width="10%">
                                        <label for=""> Đơn giá </label>
                                    </td>
                                </tr>

                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td width="10%">
                                            <label for=""><img src="{{ asset($item->product->product_thambnail) }}"
                                                    height="50px;" width="50px;"> </label>
                                        </td>
                                        <td width="20%">
                                            <label for=""> {{ $item->product->product_name }}</label>
                                        </td>
                                        <td width="10%">
                                            <label for=""> {{ $item->product->product_code }}</label>
                                        </td>
                                        <td width="10%">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>
                                        <td width="10%">
                                            <label for=""> {{ $item->size }}</label>
                                        </td>
                                        <td width="10%">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>
                                        <td width="10%">
                                            <label for=""> {{ number_format($item->price) }}₫ (
                                                {{ number_format($item->price * $item->qty) }} )₫ </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!--  // cod md -12 -->
            </div>
            <!-- /. end row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
