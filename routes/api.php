<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//===============userinfo=================
//fetch list of userinfo
Route::get('userinfo', 'App\Http\Controllers\UserInfoController@index');

//fetch single userinfo
Route::get('userinfo/{id}', 'App\Http\Controllers\UserInfoController@show');

//adding new data to userinfo
Route::post('userinfo', 'App\Http\Controllers\UserInfoController@store');

//updating data from userinfo
Route::put('userinfo', 'App\Http\Controllers\UserInfoController@store');

//delete single data
Route::delete('userinfo/{id}', 'App\Http\Controllers\UserInfoController@destroy');


//==============storeinfo=================
//fetch list of userinfo
Route::get('storeinfo', 'App\Http\Controllers\StoreInfoController@index');