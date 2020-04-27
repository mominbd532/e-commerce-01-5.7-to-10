@extends('layouts.frontLayout.front_design')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->




            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Billing To</h2>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="billing_name" id="billing_name" value="{{$user_details->name}}"  placeholder="Billing Name">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="billing_address" id="billing_address" value="{{$user_details->address}}"  placeholder="Billing Address">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="billing_city" id="billing_city" value="{{$user_details->city}}"  placeholder="Billing City">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="billing_state" id="billing_state" value="{{$user_details->state}}"  placeholder="Billing State">

                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="billing_state" id="billing_state" value="{{$user_details->country}}"  placeholder="Billing State">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="billing_pincode" id="billing_pincode" value="{{$user_details->pincode}}"  placeholder="Billing Pincode">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="billing_mobile" id="billing_mobile" value="{{$user_details->mobile}}"  placeholder="Billing Mobile">
                            </div>


                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->

                            <h2>Shipping To</h2>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="shipping_name" id="shipping_name" value="{{$shippingDetails->name}}"  placeholder="Shipping Name">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="shipping_address" id="shipping_address" value="{{$shippingDetails->address}}"  placeholder="Shipping Address">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="shipping_city" id="shipping_city" value="{{$shippingDetails->city}}"  placeholder="Shipping City">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="shipping_state" id="shipping_state" value="{{$shippingDetails->state}}"  placeholder="Shipping State">

                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="shipping_state" id="shipping_state" value="{{$shippingDetails->country}}"  placeholder="Shipping State">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="shipping_pincode" id="shipping_pincode" value="{{$shippingDetails->pincode}}"  placeholder="Shipping Pincode">
                            </div>
                            <div class="form-group">
                                <input readonly="readonly" type="text" class="form-control" name="shipping_mobile" id="shipping_mobile" value="{{$shippingDetails->mobile}}"  placeholder="Shipping Mobile">
                            </div>


                        </div><!--/sign up form-->
                    </div>


                </div>
            </div>


            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $totalAmount = 0; ?>
                    @foreach($userCart as $cart)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{asset('/images/backend_images/products/small/'.$cart->image)}}" alt="" style="width: 100px;"></a>
                        </td>
                        <td class="cart_description">
                            <h4>{{$cart->product_name}}</h4>
                            <p>{{$cart->product_code}} {{$cart->size}}</p>
                        </td>
                        <td class="cart_price">
                            <p>৳ {{$cart->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <p>{{$cart->quantity}}</p>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">৳ {{$cart->quantity*$cart->price}}</p>
                        </td>
                    </tr>
                    <?php $totalAmount = $totalAmount + ($cart->quantity*$cart->price); ?>

                    @endforeach


                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>৳ {{$totalAmount}}</td>
                                </tr>

                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>৳ 0</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Discount</td>
                                    <td>
                                        @if(!empty(Session::get('CouponAmount')))
                                            ৳ {{Session::get('CouponAmount')}}
                                            @else
                                            ৳ 0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td><span> ৳ {{$grand_total =  $totalAmount - Session::get('CouponAmount')}}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="payment-options">
                <form action="{{url('/place-order')}}" method="post" name="paymentForm" id="paymentForm">
                    {{csrf_field()}}

                    <input type="hidden" name="grand_total" value="{{$grand_total}}">

					<span>
                        <label><strong>Payment Method:</strong></label>
					</span>
                    <span>
						<label><input type="radio" id="COD" name="payment_method" value="COD"> COD</label>
					</span>
                    <span>
						<label><input type="radio" id="paypal" name="payment_method" value="paypal"> Paypal</label>
					</span>

                    <input type="submit" class="btn btn-info" style="float: right" onclick="return selectPaymentMethod();" value="Place Order">

                </form>

            </div>
        </div>
    </section> <!--/#cart_items-->

@endsection