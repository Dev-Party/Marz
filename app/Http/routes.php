<?php
/**
 * @api {get} /radio Listar
 * @apiName  GetRadioAll
 * @apiGroup Radio
 */
$app->get('/radio', function () {});

/**
 * @api {post} /radio Agregar
 * @apiName  PostRadioStore
 * @apiGroup Radio
 */
$app->post('/radio', function () {});

/**
 * @api {get} /radio/:id Ver
 * @apiName  GetRadioShow
 * @apiGroup Radio
 */
$app->get('/radio/{id}', function () {});

/**
 * @api {put} /radio/:id Actualiar
 * @apiName  PutRadioUpdate
 * @apiGroup Radio
 */
$app->put('/radio/{id}', function () {});

/**
 * @api {delete} /radio/:id Eliminar
 * @apiName  DeleteRadioDestroy
 * @apiGroup Radio
 */
$app->delete('/radio/{id}', function () {});
