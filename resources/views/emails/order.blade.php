<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
<table width="700px">
    <tr><td>&nbsp;</td></tr>
    <tr><td>Dear {{$name}}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thanks for shopping with us.</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Your order id is {{$order_id}}</td></tr>
    <tr><td>
            <table width="90%" cellspacing="5" cellpadding="5" bgcolor="#faebd7">
                <tr>
                    <td>Product Name</td>
                    <td>Product Code</td>
                    <td>Product Color</td>
                    <td>Product Size</td>
                    <td>Product Quantity</td>
                    <td>Product Price</td>
                </tr>
                @foreach($productsDetails['orders'] as $product)
                    <tr>
                        <td>{{$product['product_name']}}</td>
                        <td>{{$product['product_code']}}</td>
                        <td>{{$product['product_color']}}</td>
                        <td>{{$product['product_size']}}</td>
                        <td>{{$product['product_qty']}}</td>
                        <td>{{$product['product_price']}}</td>
                    </tr>

                @endforeach

                <tr>
                    <td colspan="5" align="right">Shipping Charge</td><td>$ {{$productsDetails['shipping_charge']}}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Discount</td><td>$ {{$productsDetails['coupon_amount']}}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Grand Total</td><td>$ {{$productsDetails['grand_total']}}</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>Bill To:</td>
                                        </tr>
                                        <tr>
                                            <td>{{$userDetails['name']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$userDetails['address']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$userDetails['city']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$userDetails['state']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$userDetails['country']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$userDetails['pincode']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$userDetails['mobile']}}</td>
                                        </tr>
                                    </table>


                                </td>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>Shipping To:</td>
                                        </tr>
                                        <tr>
                                            <td>{{$productsDetails['name']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$productsDetails['address']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$productsDetails['city']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$productsDetails['state']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$productsDetails['country']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$productsDetails['pincode']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$productsDetails['mobile']}}</td>
                                        </tr>
                                    </table>


                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>

            </table>
        </td></tr>

</table>
<p>Thanks for stay us.</p>

</body>
</html>