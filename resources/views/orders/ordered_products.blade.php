@extends('layouts.frontLayout.front_design')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{url('/my-order')}}">Orders</a></li>
                    <li class="active">Order No: {{$order_details->id}} </li>
                </ol>
            </div>

        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
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

                    @foreach($order_details->orders as $product)
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

        </div>
    </section><!--/#do_action-->

@endsection

