<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

include('route_admin.php');
include('route_user.php');
Auth::routes();

Route::group(['namespace' => 'Auth', 'prefix' => 'account'], function () {
    Route::get('register', 'RegisterController@getRegister')->name('get.register');
    Route::post('register', 'RegisterController@postRegister')->name('post.register');

    Route::get('login', 'LoginController@getLogin')->name('get.login');
    Route::post('login', 'LoginController@postLogin')->name('post.login');

    Route::get('logout', 'LoginController@getLogout')->name('get.logout.user');
    Route::get('reset-password', 'ResetPasswordController@getEmailReset')->name('get.email_reset_password');
    Route::post('reset-password', 'ResetPasswordController@checkEmailResetPassword');

    Route::get('new-password', 'ResetPasswordController@newPassword')->name('get.new_password');
    Route::post('new-password', 'ResetPasswordController@savePassword');

});

Route::group(['namespace' => 'Frontend'], function (){
   Route::get('/','HomeController@index')->name('get.home');

//   Route::get('/404','HomeController@error_page')->name('get.errors');


    Route::get('category/{slug}-{id}', 'CategoryController@getlistProduct')->name('get.list.product');
    Route::get('/product','ProductController@index')->name('get.all.product');
    Route::get('product/{slug}-{id}', 'ProductDetailController@productDetail')->name('get.detail.product');
//Route::get('/schedule', 'Schedule@index')->name('schedule');

    Route::prefix('shopping')->group(function () {
        Route::get('/add/{id}', 'ShoppingCartController@addProduct')->name('add.shopping.cart');
        Route::get('/category', 'ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
        Route::get('/update-cart/{id}', 'ShoppingCartController@updateShoppingCart')->name('ajax_update.shopping.cart');
        Route::get('/delete-cart/{id}', 'ShoppingCartController@deleteProductItem')->name('delete.shopping.cart');
    });

    Route::group(['prefix' => 'cart', 'middleware' => 'check_user_login'], function () {
        Route::get('/pay', 'ShoppingCartController@getFormPay')->name('get.form.pay');
        Route::post('/pay', 'ShoppingCartController@saveInfoShoppingCart');
    });

    Route::group(['prefix' => 'ajax', 'middleware' => 'check_user_login'], function () {
        Route::post('/review/{id}', 'RatingController@saveRating')->name('post.rating.product');
    });


//Article
    Route::get('post', 'ArticleController@getListArticle')->name('get.list.article');
    Route::get('post/{slug}-{id}', 'ArticleDetailController@articleDetail')->name('get.detail.article');


// Schedule
    Route::get('schedule', 'ScheduleController@index')->name('get.schedule');
    Route::post('schedule', 'ScheduleController@saveInfoSchedule');

    Route::get('service', 'ScheduleController@index')->name('get.schedule');

});
