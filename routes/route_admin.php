<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//login Admin
Route::group(['prefix' => 'authenticate', 'namespace' => 'Admin\Auth'], function (){

    Route::get('login', 'AdminLoginController@getLoginAdmin')->name('get.login.admin');
    Route::post('login', 'AdminLoginController@postLoginAdmin');
    Route::get('logout','AdminLoginController@getLogoutAdmin')->name('get.logout.admin');

});

//
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'check_admin_login'], function (){

    Route::get('/', 'AdminController@dashboardAdmin')->name('get.dashboard.admin');

 //Admin
 Route::group(['prefix' => 'auth'], function () {

 Route::get('/', 'AdminAuthController@index')->name('admin.get.list.admin');

 Route::get('/create', 'AdminAuthController@create')->name('admin.get.create.admin');
 Route::post('/create', 'AdminAuthController@store');

 Route::get('/update/{id}', 'AdminAuthController@edit')->name('admin.get.edit.admin');
 Route::post('/update/{id}', 'AdminAuthController@update');

 Route::get('/delete/{id}', 'AdminAuthController@delete')->name('admin.get.delete.admin');
 });

//User
    Route::group(['prefix' => 'user'], function () {

        Route::get('/', 'AdminUserController@index')->name('admin.get.list.user');

        Route::get('/create', 'AdminUserController@create')->name('admin.get.create.user');
        Route::post('/create', 'AdminUserController@store');

        Route::get('/update/{id}', 'AdminUserController@edit')->name('admin.get.edit.user');
        Route::post('/update/{id}', 'AdminUserController@update');

        Route::get('/delete/{id}', 'AdminUserController@delete')->name('admin.get.delete.user');
    });

    //User
    Route::group(['prefix' => 'role'], function () {

        Route::get('/', 'AdminRoleController@index')->name('admin.get.list.role');

        Route::get('/create', 'AdminRoleController@create')->name('admin.get.create.role');
        Route::post('/create', 'AdminRoleController@store');

        Route::get('/update/{id}', 'AdminRoleController@edit')->name('admin.get.edit.role');
        Route::post('/update/{id}', 'AdminRoleController@update');

        Route::get('/delete/{id}', 'AdminRoleController@delete')->name('admin.get.delete.role');
    });

//Category
    Route::group(['prefix' => 'category'], function () {

        Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');

        Route::get('/create', 'AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create', 'AdminCategoryController@store');

        Route::get('/update/{id}', 'AdminCategoryController@edit')->name('admin.get.edit.category');
        Route::post('/update/{id}', 'AdminCategoryController@update');

        Route::get('/delete/{id}', 'AdminCategoryController@delete')->name('admin.get.delete.category');
        Route::get('/{action}/{id}', 'AdminCategoryController@action')->name('admin.get.action.category');
    });


    //Product
    Route::group(['prefix' => 'product'], function () {

        Route::get('/', 'AdminProductController@index')->name('admin.get.list.product');

        Route::get('/create', 'AdminProductController@create')->name('admin.get.create.product');
        Route::post('/create', 'AdminProductController@store');

        Route::get('/update/{id}', 'AdminProductController@edit')->name('admin.get.edit.product');
        Route::post('/update/{id}', 'AdminProductController@update');

        Route::get('/delete/{id}', 'AdminProductController@delete')->name('admin.get.delete.product');
        Route::get('/{action}/{id}', 'AdminProductController@action')->name('admin.get.action.product');
    });

    //Article
    Route::group(['prefix' => 'article'], function () {

        Route::get('/', 'AdminArticleController@index')->name('admin.get.list.article');

        Route::get('/create', 'AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create', 'AdminArticleController@store');

        Route::get('/update/{id}', 'AdminArticleController@edit')->name('admin.get.edit.article');
        Route::post('/update/{id}', 'AdminArticleController@update');

        Route::get('/delete/{id}', 'AdminArticleController@delete')->name('admin.get.delete.article');
        Route::get('/{action}/{id}', 'AdminArticleController@action')->name('admin.get.action.article');
    });

    //Spa
    Route::group(['prefix' => 'spa'], function () {

        Route::get('/', 'AdminSpaController@index')->name('admin.get.list.spa');

        Route::get('/create', 'AdminSpaController@create')->name('admin.get.create.spa');
        Route::post('/create', 'AdminSpaController@store');

        Route::get('/update/{id}', 'AdminSpaController@edit')->name('admin.get.edit.spa');
        Route::post('/update/{id}', 'AdminSpaController@update');

        Route::get('/delete/{id}', 'AdminSpaController@delete')->name('admin.get.delete.spa');
    });

    //Employee
    Route::group(['prefix' => 'employee'], function () {

        Route::get('/', 'AdminEmployeeController@index')->name('admin.get.list.employee');

        Route::get('/create', 'AdminEmployeeController@create')->name('admin.get.create.employee');
        Route::post('/create', 'AdminEmployeeController@store');

        Route::get('/update/{id}', 'AdminEmployeeController@edit')->name('admin.get.edit.employee');
        Route::post('/update/{id}', 'AdminEmployeeController@update');

        Route::get('/delete/{id}', 'AdminEmployeeController@delete')->name('admin.get.delete.employee');
    });

    // ql don hang
    Route::group(['prefix' => 'transactions'], function () {
        Route::get('/', 'AdminTransactionController@index')->name('admin.get.list.transactions');

        Route::get('/delete/{id}', 'AdminTransactionController@delete')->name('admin.get.delete.transactions');
        Route::get('order-delete/{id}', 'AdminTransactionController@deleteOrderItem')->name('ajax.admin.transactions.order_item');
        Route::get('/view-transactions/{id}', 'AdminTransactionController@getTransactionDetail')->name('ajax.admin.transactions.detail');;
        Route::get('/{action}/{id}', 'AdminTransactionController@action')->name('admin.get.action.transactions');;
    });

    // ql dat lich
    Route::group(['prefix' => 'schedule'], function () {
        Route::get('/', 'AdminScheduleController@index')->name('admin.get.list.schedule');
        Route::get('/delete/{id}', [
            'as' => 'admin.get.delete.schedule',
            'uses' => 'AdminScheduleController@delete'
        ]);
        Route::get('/{action}/{id}', 'AdminScheduleController@action')->name('admin.get.action.schedule');
    });
    // ql thanh vien
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'AdminUserController@index')->name('admin.get.list.user');
    });

    //Menu
    Route::group(['prefix' => 'menu'], function () {

        Route::get('/', 'AdminMenuController@index')->name('admin.get.list.menu');

        Route::get('/create', 'AdminMenuController@create')->name('admin.get.create.menu');
        Route::post('/create', 'AdminMenuController@store');

        Route::get('/update/{id}', 'AdminMenuController@edit')->name('admin.get.edit.menu');
        Route::post('/update/{id}', 'AdminMenuController@update');

        Route::get('/delete/{id}', 'AdminMenuController@delete')->name('admin.get.delete.menu');
    });

    //Service
    //Menu
    Route::group(['prefix' => 'service'], function () {

        Route::get('/', 'AdminServiceController@index')->name('admin.get.list.service');

        Route::get('/create', 'AdminServiceController@create')->name('admin.get.create.service');
        Route::post('/create', 'AdminServiceController@store');

        Route::get('/update/{id}', 'AdminServiceController@edit')->name('admin.get.edit.service');
        Route::post('/update/{id}', 'AdminServiceController@update');

        Route::get('/delete/{id}', 'AdminServiceController@delete')->name('admin.get.delete.service');
    });


    //booking
    Route::group(['prefix' => 'booking'], function () {
        Route::get('/', 'AdminBookingController@index')->name('admin.get.list.booking');
    });
    Route::group(['prefix' => 'booking'], function () {
        Route::get('/create', 'AdminBookingController@create')->name('admin.get.create.booking');
           Route::post('/create', 'AdminBookingController@store');

        Route::get('/update/{id}', 'AdminBookingController@edit')->name('admin.get.edit.booking');
        Route::post('/update/{id}', 'AdminBookingController@update');

        Route::get('/delete/{id}', 'AdminBookingController@delete')->name('admin.get.delete.booking');
    });

    //review
    Route::group(['prefix' => 'rating'], function () {
        Route::get('/', 'AdminRatingController@index')->name('admin.get.list.rating');
        Route::get('/delete/{id}', 'AdminRatingController@delete')->name('admin.get.delete.rating');
    });

});
