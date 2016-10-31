<?php

Route::pattern('format', '.xml');

Route::get('/', 'HomeController@index');

Route::get('/new', 'RadioController@create');

Route::get('/radio/{id}/edit', 'RadioController@edit');

Route::group(['prefix' => 'export'], function () {
	Route::get('/', 'ExportController@index');
	Route::get('/{state}.xml', 'ExportController@xml');
});

Route::group(['prefix' => 'dashboard'], function () {
	Route::get('/radios', 'Dashboard\IndexController@getRadios');
});

Auth::routes();

Route::get('auth/facebook', 'Auth\SocialController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\SocialController@handleProviderCallback');