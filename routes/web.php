<?php

Route::get('/', 'HomeController@index');

Route::get('/new', 'RadioController@create');

Route::get('/pricing', 'PricingController@index');

Route::get('/terms-and-conditions', function () {
	return view('terms-and-conditions');
});

Route::get('/radio/{id}/edit', 'RadioController@edit');

Route::group(['prefix' => 'export'], function () {
	Route::get('/', 'ExportController@index');
	Route::get('/chaco{format}', 'ExportController@format');
});

Route::group([
		'prefix' => 'dashboard',
		'middleware' => ['auth']
	],
	function () {
		Route::get('/radios', 'Dashboard\IndexController@getRadios');
	}
);

Auth::routes();

Route::get('auth/facebook', 'Auth\SocialController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\SocialController@handleProviderCallback');