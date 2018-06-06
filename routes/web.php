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

Route::get('/', 'AdvertsController@index')->name('index'); // kieruje na stronę główną

Route:: resource('adverts', 'AdvertsController'); // 1 routa dla wszystkich metod controllera AdvertsController
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');