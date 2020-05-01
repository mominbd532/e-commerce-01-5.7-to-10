@extends('layouts.frontLayout.front_design')

@section('content')

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
                <h3>Thanks, Your your COD order is placed</h3>
                <p>Your order number is {{Session::get('order_number')}} and your payable amount is ৳ {{Session::get('total_amount')}} </p>
                <p>Please make payment by click on below payment button</p>

                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="mominbd534@gmail.com">
                    <input type="hidden" name="item_name" value="{{Session::get('order_number')}}">
                    <input type="hidden" name="currency_code" value="INR">
                    <input type="hidden" name="amount" value="{{Session::get('total_amount')}}">
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