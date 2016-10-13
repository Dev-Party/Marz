<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/new', 'HomeController@getNew');

Route::post('/new', 'HomeController@postNew');

Route::group(['prefix' => 'dashboard', 'middleware' => ['role:admin']], function() {
	Route::get('/', 'Dashboard\IndexController@getHome');
});

Auth::routes();