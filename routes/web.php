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

Auth::routes();

Route::get('/', 'VehicleController@index')->name('index');

Route::get('/vehiculo/crear', 'VehicleController@create')->name('vehiculo.crear');
Route::post('/vehiculo/guardar', 'VehicleController@store')->name('vehiculo.guardar');
Route::delete('vehiculo/eliminar/{id}', 'VehicleController@destroy')->name('vehiculo.eliminar');

