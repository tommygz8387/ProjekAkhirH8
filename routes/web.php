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

// pesanan routes
Route::get('/pesanan','pesananController@index')->name('pesanan.index')->middleware('is_admin');

// laporan routes
Route::get('/laporan','laporanController@index')->name('laporan.index')->middleware('is_admin');

// laporan routes
Route::get('/akun','userController@index')->name('user.index')->middleware('is_admin');
Route::get('/akun/{id}','userController@show')->name('user.show')->middleware('is_admin');