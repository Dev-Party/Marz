<?php

Route::get('/', 'HomeController@index');

Route::get('/new', 'RadioController@create');

Route::get('/pricing', 'PricingController@index');

Route::get('/billing', 'BillingController@getIndex');

Route::post('/billing', 'BillingController@postIndex');

Route::get('/notes', 'NotesController@all');

Route::get('/notes/new', 'NotesController@create')->middleware('auth', 'role:admin');
Route::post('/notes/new', 'NotesController@store')->middleware('auth', 'role:admin');
Route::get('/notes/edit/{id}', 'NotesController@edit')->middleware('auth', 'role:admin');
Route::post('/notes/edit/{id}', 'NotesController@update')->middleware('auth', 'role:admin');

Route::get('/terms-and-conditions', function () {
	return view('terms-and-conditions');
});

Route::get('/radio/{id}/edit', 'RadioController@edit');

Route::group(['prefix' => 'export'], function () {
	Route::get('/', 'ExportController@index');
	Route::get('/chaco{format}', 'ExportController@format');
});

// Account
Route::group(['prefix' => 'account', 'middleware' => ['auth']], function () {

	Route::get('/settings', 'Account\SettingsController@index');

	Route::post('/settings/profile/{id}', 'Account\SettingsController@profile');
	
	Route::get('/invoices', 'Account\InvoicesController@all');
	
	Route::get('/invoice/{id}.pdf', 'Account\InvoicesController@view');

});

// Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => ['role:admin']], function () {

	Route::get('/radios', 'Dashboard\IndexController@getRadios');

	Route::get('/users', 'Dashboard\UsersController@all');

});

Auth::routes();

Route::get('auth/facebook', 'Auth\SocialController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\SocialController@handleProviderCallback');