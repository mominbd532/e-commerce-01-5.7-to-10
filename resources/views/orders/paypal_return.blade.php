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
                <h3>Thanks, Your your paypal order is placed</h3>
                <p>We will deliver your product very soon.</p>
                <p>Your order number is {{Session::get('order_number')}} and your payable amount is ৳ {{Session::get('total_amount')}} </p>
            </div>

        </div>
    </section><!--/#do_action-->

@endsection

<?php
Session::forget('order_number');
Session::forget('total_amount');

?>