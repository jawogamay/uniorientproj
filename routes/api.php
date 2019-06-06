<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/user', function (Request $request) {
  return auth()->guard('api')->user();
});
Route::get('/assign','UserController@user');
Route::apiResources(['user' => 'UserController']);
Route::apiResources(['customer'=>'CustomerController']);
Route::apiResources(['booklet' => 'BookletController']);
Route::apiResources(['passenger' => 'PassengerController']);
Route::apiResources(['supplier' => 'SupplierController']);
Route::apiResources(['rates' => 'AirlineRateController']);
Route::get('getTC','BookletController@getTC');
Route::get('getCustomer','PassengerController@getCustomer');