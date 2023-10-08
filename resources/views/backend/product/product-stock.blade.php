@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách<span class="badge badge-pill badge-danger">
                                    {{ count($products) }} </span></h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ảnh </th>
                                            <th>Tên</th>
                                            <th>Giá </th>
                                            <th>Số lượng </th>
                                            {{-- <th>Giá </th> --}}
                                            <th>Trạng thái </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->product_thambnail) }}"
                                                        style="width: 60px; height: 50px;"> </td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ number_format($item->selling_price) }} ₫</td>
                                                <td>{{ $item->product_qty }} Cái</td>
                                                {{-- <td>
                                                    @if ($item->discount_price == null)
                                                        <span class="badge badge-pill badge-danger">No Discount</span>
                                                    @else
                                                        @php
                                                            $amount = $item->selling_price - $item->discount_price;
                                                            $discount = ($amount / $item->selling_price) * 100;
                                                        @endphp
                                                        <span class="badge badge-pill badge-danger">{{ round($discount) }}
                                                            %</span>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success"> Còn hàng </span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger"> Hết hàng </span>
                                                    @endif
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
