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

// Authentication Routes...
Auth::routes();

//user
Route::get('/', 'PageController@index')->name('home');
Route::get('shop', 'PageController@shop')->name('shop');
Route::get('shop/category/{category}', 'PageController@category');
Route::get('shop/{product}', 'PageController@detailProduct');

Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');

//cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::delete('cart/clear', 'CartController@clear')->name('cart.clear');
Route::post('cart/{product}', 'CartController@store')->name('cart.store');
Route::delete('cart/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::get('cart/{rowId}/edit', 'CartController@edit')->name('cart.edit');
Route::patch('cart/{rowId}', 'CartController@update')->name('cart.update');

//alamat pengiriman
Route::get('alamat-pengiriman', 'CartController@alamatPengiriman')->name('cart.alamat.pengiriman');
Route::post('alamat-pengiriman/{user}', 'CartController@updateAlamatPengiriman')->name('cart.update.alamat.pengiriman');
Route::get('konfirmasi-pembelian', 'CartController@konfirmasiPembelian')->name('cart.konfirmasi.pembelian');

//order
Route::resource('order', 'OrderController')->except(['create', 'update', 'edit']);
Route::patch('order/{order}/delivered', 'OrderController@delivered');
Route::get('order/{order}/invoice', 'OrderController@invoice');

//payment confirmation
Route::get('payment-confirmation/{order}', 'PaymentConfirmationController@create');
Route::post('payment-confirmation/{order}', 'PaymentConfirmationController@store');

//profile
Route::get('profile', 'ProfileController@index');
Route::patch('profile/update', 'ProfileController@update');
Route::patch('profile/change-password', 'ProfileController@changePassword');

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
	Route::get('dashboard', 'PageController@dashboard')->name('admin.dashboard');
	Route::resource('order', 'OrderController')->except(['create', 'update', 'edit', 'store']);
	Route::patch('order/{order}/process', 'OrderController@process');
	Route::patch('order/{order}/send', 'OrderController@send');
	Route::resource('product', 'ProductController');
	Route::patch('product/{product}/set-kosong', 'ProductController@setKosong');
	Route::patch('product/{product}/set-tersedia', 'ProductController@setTersedia');
	Route::resource('user', 'UserController');
	Route::get('web-setting', 'WebSettingController@index');
	Route::patch('web-setting', 'WebSettingController@update');
	Route::resource('category', 'CategoryController');
	Route::get('report', 'ReportController@index');
	Route::get('report/print', 'ReportController@print');
});
