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
Route::get('/clients', 'ClientsController@index')->name('clients');
Route::get('/potential_clients', 'PotentialClientsController@index')->name('potential_clients');
Route::get('/clients/create', 'ClientsController@create')->name('clients');
Route::post('/clients/store', 'ClientsController@store')->name('clients');

