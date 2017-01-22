<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/show/{id}', 'CommandantController@show')->name('show');

Route::get('/moving/{direction}', ['uses' =>'CommandantController@moving']);
Route::get('/movingJson/{info}', ['uses' =>'CommandantController@movingJson']);
Route::get('resolveBuys/{id}', ['uses' =>'CommandantController@resolveBuys']);

Route::post('order/store', [ 'as' => 'order.store', 'uses' =>  'OrderController@store']);
Route::resource('orderMission', 'OrderMissionController');
Route::resource('orderBuy', 'OrderBuyController');