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

Route::get('/', 'EquipmentAdvertsController@index')->name('index'); // kieruje na stronę główną
Route::get('subcategories/get/{id}', 'EquipmentAdvertsController@getSubcategories');
Route::get('adverts/user/{id}', 'EquipmentAdvertsController@showUserAdverts')->name('user.adverts');

Route:: resource('adverts', 'EquipmentAdvertsController'); // 1 routa dla wszystkich metod controllera EquipmentAdvertsController
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function(){ // dodałem ten logout bo routa nie działałą
    Auth::logout();
    return Redirect::to('login');
 });