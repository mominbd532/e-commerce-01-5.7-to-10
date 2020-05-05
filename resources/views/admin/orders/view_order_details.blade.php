@extends('layouts.adminLayout.admin_design')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Widgets</a> </div>
            <h1>Order #{{$orderDetails->id}}</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Order Details</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">

                                <tbody>
                                <tr>
                                    <td class="taskDesc">Order Date</td>
                                    <td class="taskStatus">{{$orderDetails->created_at}}</td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">Order Status</td>
                                    <td class="taskStatus">{{$orderDetails->order_status}}</td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">Order Total</td>
                                    <td class="taskStatus">{{$orderDetails->grand_total}} BDT</td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">Shipping Charge</td>
                                    <td class="taskStatus">{{$orderDetails->shipping_charge}} BDT</td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">Coupon Code</td>
                                    <td class="taskStatus">{{$orderDetails->coupon_code}}</td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">Coupon amount</td>
                                    <td class="taskStatus">{{$orderDetails->coupon_amount}} BDT</td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">Payment Method</td>
                                    <td class="taskStatus">{{$orderDetails->payment_method}}</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="accordion" id="collapse-group">
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title"> <h5>Billing Address</h5></div>
                            </div>
                            <div class="collapse in accordion-body" id="collapseGOne">
                                <div class="widget-content">
                                   Name: {{$user_details->name}}<br>
                                   Address: {{$user_details->address}}<br>
                                   City: {{$user_details->city}}<br>
                                   State: {{$user_details->state}}<br>
                                   Country: {{$user_details->country}}<br>
                                   Pin Code: {{$user_details->pincode}}<br>
                                   Phone:  {{$user_details->mobile}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Customer Details</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">

                                <tbody>
                                <tr>
                                    <td class="taskDesc">Customer Name</td>
                                    <td class="taskStatus">{{$orderDetails->name}}</td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">Customer Email</td>
                                    <td class="taskStatus">{{$orderDetails->user_email}}</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="accordion" id="collapse-group">
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title"> <h5>Update order status</h5></div>
                            </div>
                            <div class="collapse in accordion-body" id="collapseGOne">
                                <div class="widget-content">

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="accordion" id="collapse-group">
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title"> <h5>Shipping Address</h5></div>
                            </div>
                            <div class="collapse in accordion-body" id="collapseGOne">
                                <div class="widget-content">
                                    Name: {{$orderDetails->name}}<br>
                                    Address: {{$orderDetails->address}}<br>
                                    City: {{$orderDetails->city}}<br>
                                    State: {{$orderDetails->state}}<br>
                                    Country: {{$orderDetails->country}}<br>
                                    Pin Code: {{$orderDetails->pincode}}<br>
                                    Phone:  {{$orderDetails->mobile}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Size</th>
                        <th>Product Color</th>
                        <th>Product Price</th>
                        <th>Quantity</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($orderDetails->orders as $product)
                        <tr>
                            <td>{{$product->product_code}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_size}}</td>
                            <td>{{$product->product_color}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_qty}}</td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>
            <hr>

        </div>
    </div>







@endsection