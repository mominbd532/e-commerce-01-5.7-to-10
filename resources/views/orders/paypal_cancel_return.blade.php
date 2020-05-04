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
                <h3>Thanks, Your your paypal order is cancel</h3>
                <p>Please contact with us more info.</p>

            </div>

        </div>
    </section><!--/#do_action-->

@endsection

<?php
Session::forget('order_number');
Session::forget('total_amount');

?>