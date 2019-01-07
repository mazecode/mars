<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->group('/api', function () use ($app) {

    $app->group('/v1', function () use ($app) {
        // Tool Users
        $app->get('/users', App\Controllers\APIController::class . ':index');
        $app->get('/users/{id}', App\Controllers\APIController::class . ':get');
        $app->post('/users', App\Controllers\APIController::class . ':create');
        $app->delete('/users/{id}', App\Controllers\APIController::class . ':delete');
    });
});