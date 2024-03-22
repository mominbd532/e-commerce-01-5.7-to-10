<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MediaController;


Route::match(['get','post'],'','AdminController@login');

Route::group(['middleware'=>['admin_login']],function (){

    Route::get('/dashboard','AdminController@dashboard');
    Route::get('/setting','AdminController@setting');
    Route::get('/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/update-pwd','AdminController@updatePassword');

    //Category Routes (Admin)
    Route::match(['get','post'],'/add-category','CategoryController@addCategory');

    Route::get('/view-category','CategoryController@viewCategory');
    Route::match(['get','post'],'/edit-category/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'/delete-category/{id}','CategoryController@deleteCategory');

    //Product Route (Admin)

    Route::match(['get','post'],'/add-product','ProductController@addProduct');
    Route::get('/view-product','ProductController@viewProduct');
    Route::get('/delete-product-image/{id}','ProductController@deleteProductImage');
    Route::match(['get','post'],'/edit-product/{id}','ProductController@editProduct');
    Route::match(['get','post'],'/delete-product/{id}','ProductController@deleteProduct');

    //Orders

    Route::get('/view-orders','ProductController@viewOrders');

    //Orders details

    Route::get('/view-order/{id}','ProductController@viewOrderDetails');

    //Update Order Status

    Route::post('/update-order-status','ProductController@updateOrderStatus');

    //Attribute Route

    Route::match(['get','post'],'/add-attribute/{id}','ProductController@addAttribute');
    Route::match(['get','post'],'/edit-attribute/{id}','ProductController@editAttribute');

    Route::get('/delete-attribute/{id}','ProductController@deleteAttribute');


    //Alternative Images
    Route::match(['get','post'],'/add-images/{id}','ProductController@addImages');
    Route::match(['get','post'],'/delete-alt-image/{id}','ProductController@deleteAltProductImage');

    //Coupon

    Route::match(['get','post'],'/add-coupon','CouponsController@addCoupon');
    Route::match(['get','post'],'/edit-coupon/{id}','CouponsController@editCoupon');
    Route::get('/view-coupons','CouponsController@viewCoupons');
    Route::get('/delete-coupon/{id}','CouponsController@deleteCoupon');

    //Banner

    Route::match(['get','post'],'/add-banner','BannerController@addBanner');
    Route::get('/view-banners','BannerController@viewBanners');
    Route::match(['get','post'],'/edit-banner/{id}','BannerController@editBanner');
    Route::get('/delete-banner/{id}','BannerController@deleteBanner');

    Route::resource('media', MediaController::class);

});


Route::get('/logout','AdminController@logout');