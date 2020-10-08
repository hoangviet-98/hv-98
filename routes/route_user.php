<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'account', 'namespace' => 'User','middleware' => 'check_user_login'], function () {

    Route::get('/','UserDashboardController@dashboard')->name('get.user.dashboard');

    Route::get('/update-info','UserInfoController@updateInfo')->name('get.user.update_info');
    Route::post('/update-info','UserInfoController@saveUpdateInfo');

    Route::get('/transactions','UserTransactionController@index')->name('get.user.transactions');

});
