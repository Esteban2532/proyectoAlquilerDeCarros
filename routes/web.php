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
Route::get('vehiculo/edit/{id}', 'VehicleController@edit')->name('vehiculo.edit');
Route::put('vehiculo/{vehiculo}', 'VehicleController@update')->name('vehiculo.update');
Route::delete('vehiculo/eliminar/{id}', 'VehicleController@destroy')->name('vehiculo.eliminar');


Route::get('alquiler/informe', 'RentController@index')->name('alquiler.index');
Route::get('alquiler/{id}', 'RentController@show')->name('rent.show');
Route::post('alquiler', 'RentController@store')->name('rent.store');
Route::post('alquiler/descarga', 'RentController@informe')->name('rent.informe');



