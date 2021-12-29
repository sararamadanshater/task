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


Route::get('login', function () {
    return view('supervisor.login');
});


Route::post('login', 'SupervisorController@login')->name('supervisor.login');
Route::get('/', 'supervisorController@index')->name('supervisor');
Route::resource('categories', 'CategoryController')->except(['destroy']);
Route::any('delete/{id}', 'CategoryController@delete')->name('categories.delete');
Route::resource( 'products','ProductController')->except(['destroy']);
Route::any('delete/{id}', 'ProductController@delete')->name('products.delete');

Route::middleware(['supervisor'])->group(function () {
    
});
