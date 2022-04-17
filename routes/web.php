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
    return view('auth.login');
});

Auth::routes([
    // 'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout1');

// login routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

// kategori routes
Route::get('/kategori','kategoriController@index')->name('kategori.index');
Route::post('/kategori/post','kategoriController@store')->name('kategori.store');
Route::get('/kategori/edit/{id}','kategoriController@edit')->name('kategori.edit');
Route::post('/kategori/update/{id}','kategoriController@update')->name('kategori.update');
Route::get('/kategori/delete/{id}','kategoriController@destroy')->name('kategori.delete');


// produk routes
Route::get('/produk','produkController@index')->name('produk.index')->middleware('is_admin');
Route::get('/produk/add','produkController@create')->name('produk.create')->middleware('is_admin');
Route::post('/produk/post','produkController@store')->name('produk.store')->middleware('is_admin');
Route::get('/produk/edit/{id}','produkController@edit')->name('produk.edit');
Route::post('/produk/update/{id}','produkController@update')->name('produk.update');
Route::get('/produk/delete/{id}','produkController@destroy')->name('produk.delete');

// pesanan routes
Route::get('/pesanan','pesananController@index')->name('pesanan.index')->middleware('is_admin');
Route::get('/pesanan/add','pesananController@create')->name('pesanan.create')->middleware('is_admin');
Route::post('/pesanan/post','pesananController@store')->name('pesanan.store')->middleware('is_admin');
Route::get('/pesanan/edit/{id}','pesananController@edit')->name('pesanan.edit');
Route::post('/pesanan/update/{id}','pesananController@update')->name('pesanan.update');
Route::get('/pesanan/delete/{id}','pesananController@destroy')->name('pesanan.delete');
Route::post('/import','pesananController@import')->name('pesanan.import');

// pelanggan routes
Route::get('/pelanggan','pelangganController@index')->name('pelanggan.index')->middleware('is_admin');
Route::post('/pelanggan/post','pelangganController@store')->name('pelanggan.store');
Route::get('/pelanggan/edit/{id}','pelangganController@edit')->name('pelanggan.edit');
Route::post('/pelanggan/update/{id}','pelangganController@update')->name('pelanggan.update');
Route::get('/pelanggan/delete/{id}','pelangganController@destroy')->name('pelanggan.delete');

// laporan routes
Route::get('/laporan','laporanController@index')->name('laporan.index')->middleware('is_admin');

// akun routes
Route::get('/akun','userController@index')->name('user.index')->middleware('is_admin');
Route::get('/akun/edit/{id}','userController@edit')->name('user.edit')->middleware('is_admin');
Route::get('/akun/update/{id}','userController@update')->name('user.update')->middleware('is_admin');