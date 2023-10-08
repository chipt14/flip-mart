@extends('frontend.main-master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title')
    Thanh toán thẻ
@endsection

<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Card</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-6">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Số tiền mua sắm của bạn</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <hr>
                                        <li>
                                            @if (Session::has('coupon'))
                                                <Strong>Tổng cộng: </Strong> {{ number_format($cartTotal) }}₫
                                                <hr>
                                                <Strong>Mã giảm giá: </Strong>
                                                {{ session()->get('coupon')['coupon_name'] }}
                                                ({{ session()->get('coupon')['coupon_discount'] }}%)
                                                <hr>
                                                <Strong>Chiết khấu: </Strong>
                                                {{ number_format(session()->get('coupon')['discount_amount']) }}₫
                                                <hr>
                                                <Strong>Tiền thanh toán: </Strong>
                                                {{ number_format(session()->get('coupon')['total_amount']) }}₫
                                                <hr>
                                            @else
                                                <Strong>Tổng cộng: </Strong> {{ number_format($cartTotal) }}₫
                                                <hr>
                                                <Strong>Tiền thanh toán: </Strong> {{ number_format($cartTotal) }}₫
                                                <hr>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Phương thức thanh toán</h4>
                                </div>
                                <form action="{{ route('stripe.order') }}" method="post" id="payment-form">
                                    @csrf
                                    <div class="form-row">
                                        <label for="card-element">
                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="city_id"
                                                value="{{ $data['city_id'] }}">
                                            <input type="hidden" name="district_id"
                                                value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="ward_id"
                                                value="{{ $data['ward_id'] }}">
                                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                        </label>

                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Thanh toán</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<script>
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51NmyIjEvRTLlCGYTQIcM211iJjTh3kxbXUF8ppImMFcuhOdafSAMEsXeqPAvLoVw6rqFrTIfUmnci2eMYbGVEeTD00gpXLYRJa');
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>
@endsection
