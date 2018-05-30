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

Route::get('/videoteka', 'VideotekaController@index');
Route::post('/list', 'VideotekaController@list');
Route::get('/create', 'VideotekaController@create');
//Route::view('create', 'create');
Route::post('/store', 'VideotekaController@store');
Route::get('/view/{id}', 'VideotekaController@view');
Route::get('/show/{id}', 'VideotekaController@show');
Route::delete('/delete/{id}', 'VideotekaController@destroy');
Route::post('/update/{id}', 'VideotekaController@update');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
