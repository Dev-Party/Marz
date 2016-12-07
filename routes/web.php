<?php

Route::get('/', 'HomeController@index');

Route::get('/new', 'RadioController@create');

Route::get('/pricing', 'PricingController@index');

Route::get('/billing', 'BillingController@getIndex');

Route::post('/billing', 'BillingController@postIndex');

// Notes
Route::get('/notes', 'NotesController@all');

Route::get('/notes/new', 'NotesController@create')->middleware('auth', 'role:administrator');
Route::post('/notes/new', 'NotesController@store')->middleware('auth', 'role:administrator');
Route::get('/notes/edit/{id}', 'NotesController@edit')->middleware('auth', 'role:administrator');
Route::post('/notes/edit/{id}', 'NotesController@update')->middleware('auth', 'role:administrator');

// Radios
Route::get('/radio/{id}', 'RadioController@show');
Route::get('/radio/{id}/edit', 'RadioController@edit');

// Export
Route::group(['prefix' => 'export'], function () {
	Route::get('/', 'ExportController@index');
	Route::get('/chaco.xml', 'ExportController@format');
});

// Account
Route::group(['prefix' => 'account', 'middleware' => ['auth']], function () {

	Route::get('/settings', 'Account\SettingsController@index');

	Route::post('/settings/profile/{id}', 'Account\SettingsController@profile');

	Route::post('/settings/password', 'Account\SettingsController@password');
	
	Route::get('/invoices', 'Account\InvoicesController@all');
	
	Route::get('/invoice/{id}.pdf', 'Account\InvoicesController@pdf');

});

// Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => ['role:administrator']], function () {

	Route::get('/radios', 'Dashboard\IndexController@getRadios');

	Route::get('/users', 'Dashboard\UsersController@all');

});

// Terms-and-conditions
Route::get('/terms-and-conditions', function () {
	return view('terms-and-conditions');
});

Auth::routes();

Route::get('auth/facebook', 'Auth\SocialController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\SocialController@handleProviderCallback');