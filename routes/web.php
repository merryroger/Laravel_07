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

Route::get('/product', 'ProductController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/set_job/{user}', 'JobsController@setJob');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('emails', 'JobsController@sendEmail');

Route::get('test_cache', 'TestsController@index');