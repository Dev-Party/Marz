<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('/radio', 'Api\RadiosController@all');
Route::post('/radio', 'Api\RadiosController@create');
Route::get('/radio/search', 'Api\RadiosController@search');
Route::get('/radio/{id}', 'Api\RadiosController@show');
Route::put('/radio/{id}', 'Api\RadiosController@update');
Route::delete('/radio/{id}', 'Api\RadiosController@destroy');

Route::get('/modulation', 'Api\ModulationsController@getAll');

Route::get('/state', 'Api\StatesController@all');
Route::get('/state/{id}/cities', 'Api\StatesController@cities');

Route::get('/note', 'Api\NotesController@all');
