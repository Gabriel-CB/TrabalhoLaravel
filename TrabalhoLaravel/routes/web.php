<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SuppliersController;
use \App\Http\Controllers\ProductsController;

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
    return view('home');
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/products/add', 'add');
    Route::get('/products/edit/{id}', 'edit');
    Route::post('/products/update', 'update');
});

Route::controller(SuppliersController::class)->group(function () {
    Route::get('/suppliers', 'index');
    Route::get('/suppliers/add', 'add');
    Route::get('/suppliers/edit/{id}', 'edit');
    Route::post('/suppliers/update', 'update');
});
