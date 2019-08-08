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
Route::get('/','Website\Home\HomeController@index')->name('landing.index');
Route::get('qrcode',function(){
	\QrCode::size(500)
            ->format('png')
            ->generate('notfound', public_path('images/qrcode.png'));
    
	return view('website.qrcode.qrcode');
});
Route::post('/','Website\Home\HomeController@store')->name('home.store');
Route::get('/cities/{id}','Website\Home\HomeController@getCities')->name('home.cities');
Route::get('/districts/{id}','Website\Home\HomeController@getDistricts')->name('home.districts');
Route::get('/subdistricts/{id}','Website\Home\HomeController@getSubDistricts')->name('home.subdistricts');
Route::get('/home','Pendaftaran\Home\HomeController@index')->name('pendaftaran.index');
Route::get('/login','Pendaftaran\Auth\LoginController@index')->name('login.index');
Route::post('/login','Pendaftaran\Auth\LoginController@store')->name('login.store');
Route::resource('pengguna','Pengguna\PenggunaController');

Route::get('/tap/{id}', 'Tap\Tap\TappingController@tapCard')->name('tap.process');
