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

Route::get('/new', 'RadioController@create');

Route::get('/radio/{id}/edit', 'RadioController@edit');

Route::get('/export/xml/{state}', 'ExportController@xml');
Route::get('/export', 'ExportController@index');

Route::group(['prefix' => 'dashboard'], function() {
	Route::get('/radios', 'Dashboard\IndexController@getRadios');
});

Auth::routes();

Route::get('auth/facebook', 'Auth\SocialController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\SocialController@handleProviderCallback');