<?php
/**
 * @api {get} /radio Listar
 * @apiDescription  Ruta para obtener todas las radios.
 * @apiName  All
 * @apiGroup  Radio
 * @apiPermission  none
 */
$app->get('/radio', 'RadiosController@getAll');

/**
 * @api {post} /radio Agregar
 * @apiDescription  Ruta para agregar una radio nueva.
 * @apiName  Store
 * @apiGroup  Radio
 * @apiPermission  none
 * 
 * @apiParam {String} name Nombre de la radio.
 * @apiParam {String} streaming URL de la radio.
 */
$app->post('/radio', 'RadiosController@postStore');

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
 * @apiSuccess  {String} name Nombre de la radio.
 * @apiSuccess  {String} streaming URL de transmisión de la radio.
 */
$app->get('/radio/{id}', 'RadiosController@getShow');

/**
 * @api {put} /radio/:id Actualiar
 * @apiDescription  Ruta para editar la información de una radio.
 * @apiName  Update
 * @apiGroup  Radio
 * @apiPermission  admin
 * 
 * @apiParam {Number} id Identificador único de la radio.
 * @apiParam {String} name Nombre de la radio.
 * @apiParam {String} streaming URL de la radio.
 */
$app->put('/radio/{id}', 'RadiosController@putUpdate');

/**
 * @api {delete} /radio/:id Eliminar
 * @apiDescription  Ruta para eliminar una radio.
 * @apiName  Destroy
 * @apiGroup  Radio
 * @apiPermission  admin
 * 
 * @apiParam {Number} id Identificador único de la radio.
 */
$app->delete('/radio/{id}', 'RadiosController@deleteDestroy');
