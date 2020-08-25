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

Route::get('/', 'ShopController@index')->name('shop.index');
Route::get('/{id}/add-To-Cart', 'CartController@addToCart')->name('cart.addToCart');
Route::get('/checkout','CartController@checkOut')->name('cart.checkout');
Route::post('/checkout','CartController@placeOder')->name('cart.placeOder');
Route::get('/{id}/view-product','ShopController@viewProduct')->name('shop.viewProduct');
Route::get('/view-cart','CartController@index')->name('cart.viewCart');



Route::middleware('auth')->prefix('admin')->group(function (){
    Route::get('/','HomeController@index')->name('admin.home');
    Route::prefix('product')->group(function (){
        Route::get('/','ProductController@index')->name('product.list');
        Route::get('/create','ProductController@create')->name('product.create');
        Route::post('/store','ProductController@store')->name('product.store');
        Route::get('/{id}/edit','ProductController@edit')->name('product.edit');
        Route::post('/{id}/update','ProductController@update')->name('product.update');
        Route::get('/{id}/delete','ProductController@delete')->name('product.delete');
    });
    Route::prefix('bill')->group(function (){
        Route::get('/list','BillController@index')->name('bill.list');
        Route::get('/{id}/view-detail','BillController@viewDetail')->name('bill.viewdetail');
    });
});

Auth::routes();




