@extends('layouts.frontLayout.front_design')

@section('content')
    <?php
    use App\Order;
    $orderDetails =Order::getOrderDetails(Session::get('order_number'));
//    $orderDetails =json_decode(json_encode($orderDetails));
//    echo "<pre>"; print_r($orderDetails); die;
    $nameArr =explode(' ',$orderDetails->name);
    $countryCode =Order::getCountryCode($orderDetails->country);
    ?>

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Thanks</li>
                </ol>
            </div>

        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading" align="center">
                <h3>Thanks, Your your paypal order is need to placed</h3>
                <p>Your order number is {{Session::get('order_number')}} and your payable amount is ৳ {{Session::get('total_amount')}} </p>
                <p>Please make payment by click on below payment button</p>

                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="mominbd534@gmail.com">
                    <input type="hidden" name="item_name" value="{{Session::get('order_number')}}">
                    <input type="hidden" name="currency_code" value="INR">
                    <input type="hidden" name="amount" value="{{Session::get('total_amount')}}">
                    <input type="hidden" name="first_name" value="{{$nameArr[0]}}">
                    <input type="hidden" name="last_name" value="{{$nameArr[1]}}">
                    <input type="hidden" name="address1" value="{{$orderDetails->address}}">
                    <input type="hidden" name="address2" value="">
                    <input type="hidden" name="city" value="{{$orderDetails->city}}">
                    <input type="hidden" name="state" value="{{$orderDetails->state}}">
                    <input type="hidden" name="zip" value="{{$orderDetails->pincode}}">
                    <input type="hidden" name="night_phone_a" value="">
                    <input type="hidden" name="night_phone_b" value="">
                    <input type="hidden" name="night_phone_c" value="{{$orderDetails->mobile}}">
                    <input type="hidden" name="email" value="{{$orderDetails->user_email}}">
                    <input type="hidden" name="country" value="{{$countryCode->country_code}}">
                    <input type="hidden" name="return" value="{{url('/paypal/return')}}">
                    <input type="hidden" name="cancel_return" value="{{url('/paypal/cancel-return')}}">
                    <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Buy Now">
                    <img alt="" src="https://paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
            </div>

        </div>
    </section><!--/#do_action-->

@endsection

<?php
Session::forget('order_number');
Session::forget('total_amount');

?>