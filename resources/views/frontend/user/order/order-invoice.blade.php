<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hóa đơn</title>

    <style>
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: #108bea;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: #108bea;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: #108bea; font-size: 26px;"><strong>Flipmart</strong></h2>
            </td>
            <td align="right">
                <pre class="font">
                    Trụ sở chính Flipmart
                    Email:support@flipmart.com <br>
                    Tel: 0372953295 <br>
                    Bắc Từ Liêm, Hà Nội:#4 <br>
                </pre>
            </td>
        </tr>
    </table>
    <table width="100%" style="background:white; padding:2px;""></table>
    <table width=" 100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Tên:</strong> {{ $order->name }} <br>
                    <strong>Email:</strong> {{ $order->email }} <br>
                    <strong>Số điện thoại:</strong> {{ $order->phone }} <br>
                    @php
                        $div = $order->city->city_name;
                        $dis = $order->district->district_name;
                        $pro = $order->ward->ward_name;
                    @endphp
                    <strong>Địa chỉ:</strong> {{ $div }},{{ $dis }}.{{ $pro }} <br>
                </p>
            </td>
            <td>
                <p class="font">
                <h3><span style="color: #108bea;">Hóa đơn:</span> #{{ $order->invoice_no }}</h3>
                Ngày đặt hàng: {{ $order->order_date }} <br>
                Ngày giao hàng: {{ $order->delivered_date }} <br>
                Hình thức thanh toán: {{ $order->payment_method }} </span>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Products</h3>
    <table width="100%">
        <thead style="background-color: #108bea; color:#FFFFFF;">
            <tr class="font">
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Size</th>
                <th>Màu</th>
                <th>Mã</th>
                <th>Số lượng</th>
                <th>Đơn giá </th>
                <th>Tổng cộng </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItem as $item)
                <tr class="font">
                    <td align="center">
                        <img src="{{ public_path($item->product->product_thambnail) }}" height="60px;" width="60px;"
                            alt="">
                    </td>
                    <td align="center">{{ $item->product->product_name }}</td>
                    <td align="center">
                        @if ($item->size == null)
                            ----
                        @else
                            {{ $item->size }}
                        @endif
                    </td>
                    <td align="center">{{ $item->color }}</td>
                    <td align="center">{{ $item->product->product_code }}</td>
                    <td align="center">{{ $item->qty }}</td>
                    <td align="center">{{ number_format($item->price) }}₫</td>
                    <td align="center">{{ number_format($item->price * $item->qty) }}₫</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
                <h2><span style="color: #108bea;">Tổng cộng:</span> {{ number_format($order->amount) }}₫</h2>
                <h2><span style="color: #108bea;">Thanh toán:</span> {{ number_format($order->amount) }}₫</h2>
                {{-- <h2><span style="color: #108bea;">Full Payment PAID</h2> --}}
            </td>
        </tr>
    </table>
    <div class="thanks mt-3">
        <p>
            Cảm ơn bạn đã mua sản phẩm!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Chữ ký của cơ quan có thẩm quyền:</h5>
    </div>
</body>

</html>
