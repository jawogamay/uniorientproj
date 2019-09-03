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
Route::apiResources(['salesagreement' => 'SaleAgreementController']);
Route::apiResources(['bookletstart' => 'BookletStartController']);
Route::apiResources(['rates' => 'AirlineRateController']);
Route::apiResources(['itemcode' => 'ItemCodeController']);
Route::apiResources(['start' => 'StartFileController']);
Route::apiResources(['salesummaries' => 'SalesSummariesController']);
Route::get('countStart','StartFileController@count');
Route::get('countRate','AirlineRateController@countRate');
Route::get('getPassengers','SaleAgreementController@getPassenger');
Route::get('getSalesCustomer','SaleAgreementController@getCustomer');
Route::get('getsalesagreement','AirlineIataController@getsalesagreement');
Route::get('getItemCode','SalesSummariesController@getItemCode');
Route::get('getUsedSA','SaleAgreementController@getUsedSA');
/*Route::apiResources(['soa' => 'SOAController']);
Route::apiResources(['cv' => 'CVController']);
Route::apiResources(['chv' => 'CHVController']);
Route::apiResources(['ar' => 'ARController']);*/
Route::get('getTC','BookletController@getTC');
/*Route::get('search','PassengerController@autocomplete');
Route::get('getAccountName','PassengerController@getAccountName');*/
Route::get('getCustomer','PassengerController@getCustomer');