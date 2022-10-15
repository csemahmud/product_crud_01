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
    return view('welcome');
});

Route::resource('product', 'App\Http\Controllers\ProductController');

Route::post('product/store', 'App\Http\Controllers\ProductController@store');

Route::put('product/update', 'App\Http\Controllers\ProductController@update');