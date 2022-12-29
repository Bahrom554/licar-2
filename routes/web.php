<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['middleware'=>['auth']],function() {
    Route::get('/', function () {
        return view('admin.layouts.app');
    })->name('home');
    Route::resource('users','UserController');
    Route::resource('/drivers','DriverController');
    Route::resource('/branches','BranchController');
    Route::resource('cars','CarController');
    Route::get('/search', 'DriverController@search');
    Route::post('/payments','PaymentController@store')->name('payment.store');
    Route::delete('/payments/{payment}','PaymentController@destroy')->name('payment.destroy');
    Route::get('/payments','PaymentController@report')->name('payment.report');
    Route::post('/bonuses','BonusController@store')->name('bonus.store');
    Route::put('bonuses/{bonus}','BonusController@update')->name('bonus.update');
    Route::delete('bonuses/{bonus}','BonusController@destroy')->name('bonus.destroy');
    Route::post('/services','ServiceController@store')->name('service.store');
    Route::put('services/{service}','ServiceController@update')->name('service.update');
    Route::delete('services/{service}','ServiceController@destroy')->name('service.destroy');
    Route::get('report','PaymentController@report')->name('report');
    Route::get('repo','PaymentController@repo')->name('repo');


});
Auth::routes();
