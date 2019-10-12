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

Route::post('/register', 'Api\Pendaftaran\PendaftaranController@store')->name('api.daftar');
Route::get('/test', 'Api\Pendaftaran\PendaftaranController@index')->name('api.test');
Route::post('/tap/multi', 'Tap\Tap\TappingController@tapCardMultiPost')->name('api.tap');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
