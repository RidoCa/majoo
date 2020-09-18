<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layout.login');
});

Route::get('/login', 'App\Http\Controllers\authController@login')->name('login');

Route::get('/regis', 'App\Http\Controllers\authController@regis');

Route::get('/regisadmin', 'App\Http\Controllers\authController@regisadmin');

Route::post('/postregis', 'App\Http\Controllers\authController@postregis');

Route::post('/postlogin', 'App\Http\Controllers\authController@postlogin');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', 'App\Http\Controllers\authController@logout');
    Route::get('/dashboard', 'App\Http\Controllers\authController@beranda');
    
    //crud produk
    Route::get('/produk', 'App\Http\Controllers\productController@index');
    Route::post('/produkbaru', 'App\Http\Controllers\productController@store');
    Route::post('/produkupdate', 'App\Http\Controllers\productController@update');
    Route::get('/produkdel/{id}', 'App\Http\Controllers\productController@delete');
    
    Route::get('/katalog', 'App\Http\Controllers\productController@katalog');
    Route::post('/pesan', 'App\Http\Controllers\pesananController@store');
    Route::get('/pesanan', 'App\Http\Controllers\pesananController@index');
    Route::get('/pesananacc', 'App\Http\Controllers\pesananController@indexacc');
    Route::get('/pesananhis', 'App\Http\Controllers\pesananController@his');
    Route::get('/konfirmasi/{id}', 'App\Http\Controllers\pesananController@acc');
    
 
});




