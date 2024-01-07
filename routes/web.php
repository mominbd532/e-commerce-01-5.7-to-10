<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//Homepage

Route::get('/','IndexController@index');

Route::group(['prefix' => 'admin'], function () {
    include_once('admin.php');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Categories/listing

Route::get('/products/{url}','ProductController@products');


//Product Details

Route::get('/product-details/{id}','ProductController@product');

//Product Price
Route::get('/get-product-price','ProductController@getProductPrice');


//Add to Cart

Route::match(['get','post'],'/add-cart','ProductController@addToCart');

//Cart Page

Route::match(['get','post'],'/cart','ProductController@cart');
Route::get('/cart/delete-product/{id}','ProductController@cartDeleteProduct');
Route::get('/cart/update-quantity/{id}/{quantity}','ProductController@updateProductCartQuantity');

//Coupon

Route::post('/cart/apply-coupon','ProductController@applyCoupon');

//Login Register

Route::get('/login-register','UsersController@loginRegister');
Route::get('/logout','UsersController@logout');
Route::post('/register','UsersController@register');
Route::post('/login','UsersController@login');
Route::match(['get','post'],'/check-email','UsersController@check_email');
Route::get('/confirm/{code}','UsersController@confirmEmail');




Route::group(['middleware'=>['front_login']],function (){

    // Account

    Route::match(['get','post'],'/account','UsersController@account');
    Route::post('/check-user-password','UsersController@checkPassword');
    Route::post('/update-user-pwd','UsersController@updatePassword');

    //Check Out

    Route::match(['get','post'],'/check-out','ProductController@checkOut');

    //Order Details

    Route::match(['get','post'],'/order-details','ProductController@orderDetails');

    //Place order

    Route::match(['get','post'],'/place-order','ProductController@placeOrder');

    //Thanks

    Route::get('/thanks','ProductController@thanks');

    //Paypal

    Route::get('/paypal','ProductController@paypal');

    //Paypal Return

    Route::get('/paypal/return','ProductController@paypalReturn');

    //Paypal Cancel Return

    Route::get('/paypal/cancel-return','ProductController@paypalCancelReturn');


    //My Order

    Route::get('/my-order','ProductController@userOrders');

    //My Ordered Product Details

    Route::get('/my-order/{id}','ProductController@userOrderedProducts');




});


