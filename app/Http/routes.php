<?php
$app->get('/', function () {
	return "Marz 0.0.0 - API pública para la gestión de radios en Internet.";
});

/**
 * @api {get} /radio Listar
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
$app->get('/radio', 'RadiosController@all');

/**
 * @api {post} /radio Agregar
 * @apiDescription  Ruta para agregar una radio nueva.
 * @apiName  Create
 * @apiGroup  Radio
 * @apiPermission  none
 * 
 * @apiParam {String} name Nombre de la radio.
 * @apiParam {String} streaming URL Dirección del streaming de audio.
 */
$app->post('/radio', 'RadiosController@create');

/**
 * @api {search} /radio/search/ Buscar
 * @apiDescription  Ruta para buscar una radio.
 * @apiName  Search
 * @apiGroup  Radio
 * @apiPermission  none
 * 
 * @apiParam {String} q Nombre de la radio a buscar.
 * @apiParam {Number} count Especifica el número de radios para tratar de recuperar.
 */
$app->get('/radio/search', 'RadiosController@search');

/**
 * @api {get} /radio/:id Ver
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
$app->get('/radio/{id}', 'RadiosController@show');

/**
 * @api {put} /radio/:id Actualiar
 * @apiDescription  Ruta para editar la información de una radio.
 * @apiName  Update
 * @apiGroup  Radio
 * @apiPermission  admin
 * 
 * @apiParam {Number} id Identificador único de la radio.
 * @apiParam {String} name Nombre de la radio.
 * @apiParam {String} streaming Dirección del streaming de audio.
 */
$app->put('/radio/{id}', 'RadiosController@update');

/**
 * @api {delete} /radio/:id Eliminar
 * @apiDescription  Ruta para eliminar una radio.
 * @apiName  Destroy
 * @apiGroup  Radio
 * @apiPermission  admin
 * 
 * @apiParam {Number} id Identificador único de la radio.
 */
$app->delete('/radio/{id}', 'RadiosController@destroy');

/**
 * @api {get} /modulation Listar
 * @apiDescription  Ruta para obtener todas las modulaciones.
 * @apiName  All
 * @apiGroup  Modulation
 * @apiPermission  none
 */
$app->get('/modulation', 'ModulationsController@getAll');

/**
 * @api {get} /state Listar
 * @apiDescription  Ruta para obtener todas las provincias.
 * @apiName  All
 * @apiGroup  State
 * @apiPermission  none
 */
$app->get('/state', 'StatesController@all');

/**
 * @api {get} /state/:id/cities Listar ciudades
 * @apiDescription  Obtener todas las ciudades de una provincia.
 * @apiName  Cities
 * @apiGroup  State
 * @apiPermission  none
 */
$app->get('/state/{id}/cities', 'StatesController@cities');
