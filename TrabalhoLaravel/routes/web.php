<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Products;
use \App\Models\Suppliers;

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

Route::controller(Products::class)->group(function () {
    Route::get('/products', 'index');
    Route::post('/products/add', 'add');
    Route::get('/products/edit/{id}', 'edit');
    Route::post('/products/update/{id}', 'update');
});

Route::controller(Suppliers::class)->group(function () {
    Route::get('/suppliers', 'index');
    Route::post('/suppliers/add', 'add');
    Route::get('/suppliers/edit/{id}', 'edit');
    Route::post('/suppliers/update/{id}', 'update');
});
