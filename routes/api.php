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

/**
 * @api {get} /radio Listar
 * @apiVersion 1.0.0
 * @apiDescription  Ruta para obtener todas las radios.
 * @apiName  All
 * @apiGroup  Radio
 * @apiPermission  none
 * 
 * @apiParam {Number} count Especifica el número de radios para tratar de recuperar.
 * 
 * @apiSuccessExample  Ejemplo de respuesta
 * 	{
 * 		"id": 1
 * 		"state_id": 1
 * 		"city_id": 1
 * 		"modulation_id": 1
 * 		"state": "Chaco"
 * 		"city": "Resistencia"
 * 		"modulation": "AM"
 * 		"name": "Radio Marz"
 * 		"frequency": 100.9
 * 		"streaming": "http://marz.dev:8000/streaming"
 * 		"active": 1
 * 		"created_at": "2016-04-13 20:03:25"
 * 		"updated_at": "2016-04-13 20:03:25"
 * 	}
 */
Route::get('/radio', 'RadiosController@all');

/**
 * @api {post} /radio Agregar
 * @apiVersion 1.0.0
 * @apiDescription  Ruta para agregar una radio nueva.
 * @apiName  Create
 * @apiGroup  Radio
 * @apiPermission  none
 * 
 * @apiParam {String} name Nombre de la radio.
 * @apiParam {String} streaming URL Dirección del streaming de audio.
 */
Route::post('/radio', 'RadiosController@create');

/**
 * @api {search} /radio/search/ Buscar
 * @apiVersion 1.0.0
 * @apiDescription  Ruta para buscar una radio.
 * @apiName  Search
 * @apiGroup  Radio
 * @apiPermission  none
 * 
 * @apiParam {String} q Nombre de la radio a buscar.
 * @apiParam {Number} count Especifica el número de radios para tratar de recuperar.
 */
Route::get('/radio/search', 'RadiosController@search');

/**
 * @api {get} /radio/:id Ver
 * @apiVersion 1.0.0
 * @apiDescription  Ruta para ver la información de una radio.
 * @apiName  Show
 * @apiGroup  Radio
 * @apiPermission  none
 * 
 * @apiParam  {Number} id Identificador único de la radio.
 * 
 * @apiSuccess  {Number} id Identificador único de la radio.
 * @apiSuccess  {String} modulation Modulación de la radio (AM, FM o AM-FM).
 * @apiSuccess  {String} name Nombre de la radio.
 * @apiSuccess  {String} streaming  URL de transmisión de la radio.
 * @apiSuccess  {Number} frequency  Número de la frecuencia (Mhz).
 * @apiSuccess  {String} streaming  Dirección del streaming de audio.
 * 
 * @apiSuccessExample  Ejemplo de respuesta
 * 	{
 * 		"id": 1
 * 		"state_id": 1
 * 		"city_id": 1
 * 		"modulation_id": 1
 * 		"state": "Chaco"
 * 		"city": "Resistencia"
 * 		"modulation": "AM"
 * 		"name": "Radio Marz"
 * 		"frequency": 100.9
 * 		"streaming": "http://marz.dev:8000/streaming"
 * 		"active": 1
 * 		"created_at": "2016-04-13 20:03:25"
 * 		"updated_at": "2016-04-13 20:03:25"
 * 	}
 */
Route::get('/radio/{id}', 'RadiosController@show');

/**
 * @api {put} /radio/:id Actualiar
 * @apiVersion 1.0.0
 * @apiDescription  Ruta para editar la información de una radio.
 * @apiName  Update
 * @apiGroup  Radio
 * @apiPermission  admin
 * 
 * @apiParam {Number} id Identificador único de la radio.
 * @apiParam {String} name Nombre de la radio.
 * @apiParam {String} streaming Dirección del streaming de audio.
 */
Route::put('/radio/{id}', 'RadiosController@update');

/**
 * @api {delete} /radio/:id Eliminar
 * @apiVersion 1.0.0
 * @apiDescription  Ruta para eliminar una radio.
 * @apiName  Destroy
 * @apiGroup  Radio
 * @apiPermission  admin
 * 
 * @apiParam {Number} id Identificador único de la radio.
 */
Route::delete('/radio/{id}', 'RadiosController@destroy');

/**
 * @api {get} /modulation Listar
 * @apiVersion 1.0.0
 * @apiDescription  Ruta para obtener todas las modulaciones.
 * @apiName  All
 * @apiGroup  Modulation
 * @apiPermission  none
 */
Route::get('/modulation', 'ModulationsController@getAll');

/**
 * @api {get} /state Listar
 * @apiVersion 1.0.0
 * @apiDescription  Ruta para obtener todas las provincias.
 * @apiName  All
 * @apiGroup  State
 * @apiPermission  none
 */
Route::get('/state', 'StatesController@all');

/**
 * @api {get} /state/:id/cities Listar ciudades
 * @apiVersion 1.0.0
 * @apiDescription  Obtener todas las ciudades de una provincia.
 * @apiName  Cities
 * @apiGroup  State
 * @apiPermission  none
 */
Route::get('/state/{id}/cities', 'StatesController@cities');
