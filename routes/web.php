<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('clase', 'ClaseController');
Route::resource('carta', 'CartaController');
Route::resource('jugador', 'JugadorController');
Route::resource('sobre', 'SobreController');
Route::resource('compra', 'CompraController');
Route::get('intercambio', 'IntercambioController@index');