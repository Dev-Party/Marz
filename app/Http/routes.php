<?php
/**
 * @api {get} /radio Listar
 * @apiDescription  Ruta para obtener todas las radios.
 * @apiName  All
 * @apiGroup  Radio
 * @apiPermission  none
 */
$app->get('/radio', function () {});

/**
 * @api {post} /radio Agregar
 * @apiDescription  Ruta para agregar una radio nueva.
 * @apiName  Store
 * @apiGroup  Radio
 * @apiPermission  none
 */
$app->post('/radio', function () {});

/**
 * @api {get} /radio/:id Ver
 * @apiDescription  Ruta para ver la información de una radio.
 * @apiName  Show
 * @apiGroup  Radio
 * @apiPermission  none
 * 
 * @apiParam {Number} id Identificador único de la radio.
 */
$app->get('/radio/{id}', function () {});

/**
 * @api {put} /radio/:id Actualiar
 * @apiDescription  Ruta para editar la información de una radio.
 * @apiName  Update
 * @apiGroup  Radio
 * @apiPermission  admin
 * 
 * @apiParam {Number} id Identificador único de la radio.
 */
$app->put('/radio/{id}', function () {});

/**
 * @api {delete} /radio/:id Eliminar
 * @apiDescription  Ruta para eliminar una radio.
 * @apiName  Destroy
 * @apiGroup  Radio
 * @apiPermission  admin
 * 
 * @apiParam {Number} id Identificador único de la radio.
 */
$app->delete('/radio/{id}', function () {});
