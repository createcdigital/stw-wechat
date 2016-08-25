<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/', 'HomePageController@homepage');
//});

Route::post('/homepage/{categoryId}', 'HomePageController@getDataByCategoryId');

Route::get('/store/{id}', 'StoreController@index');

Route::get('/coupon/{id}&{package}','CouponDetailController@index');

Route::any('/pay/notify', 'PayController@notify');

Route::get('/pay/test','PayController@test');

Route::get('/qrcode/{orderid}','TicketController@qrcode');

Route::get('/ticket/{out_trade_no}', 'TicketController@ticketInfo');
