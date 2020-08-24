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

Route::get('/', 'HomeController@mainHome')->name('home.mainHome');
Route::get('/check', function () {
    return view('checkout');
});

Route::get('/welcome', function () {
    return view('welcome');
});

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
});

Auth::routes();




