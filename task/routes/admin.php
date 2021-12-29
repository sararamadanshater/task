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
    return view('admin.login');
});
Route::post('login', 'AdminController@login')->name('admin.login');

Route::middleware(['adminAuth'])->group(function () {
    Route::get('/', 'adminController@index')->name('admin');
    Route::get('create', 'adminController@create')->name('supervisor.create');
    Route::post('store', 'adminController@store')->name('supervisor.store');
    Route::get('show/{id}', 'adminController@show')->name('supervisor.show');
    Route::get('edit/{id}', 'adminController@edit')->name('supervisor.edit');
    Route::post('update/{id}', 'adminController@update')->name('supervisor.update');
    Route::any('destroy/{id}', 'adminController@destroy')->name('supervisor.destroy');
    Route::any('supervisorsDeleteAll', 'adminController@deleteAll')->name('supervisors.delete.all');
});
