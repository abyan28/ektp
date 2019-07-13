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
Route::resource('pengguna','Pengguna\PenggunaController');
