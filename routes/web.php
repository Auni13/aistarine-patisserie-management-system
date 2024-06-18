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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');

Route::resource('/staff', '\App\Http\Controllers\StaffController');
Route::resource('/product', '\App\Http\Controllers\ProductController');
Route::resource('/order', '\App\Http\Controllers\OrderController');

