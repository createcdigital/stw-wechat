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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pay/test', 'PayController@test');

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/pay', 'PayController@pay');
});

Route::any('/pay/notify', 'PayController@notify');


Route::get('/journey','JourneyController@journey');
Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/detail/{id}','JourneyController@detail');
});
Route::get('/proof/{orderid}','JourneyController@proof');
Route::post('/ajax/saveProof','AjaxController@saveProof');

Route::get('/ticket/{couponid}', 'JourneyController@ticketInfo');
