<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->group('/api', function () use ($app) {
    $app->post('/logs', function (Request $request, Response $response, array $args) {
        $this->logger->info('API');
        $this->logger->info((string) $response->getBody());
    });

    $app->group('/v1', function () use ($app) {
        $app->post('/login', App\Controllers\LoginController::class . ':login');

        // Tool Users
        $app->get('/users', App\Controllers\APIController::class . ':index');
        $app->get('/users/{id:[0-9]+}', App\Controllers\APIController::class . ':get');
        $app->post('/users', App\Controllers\APIController::class . ':create');
        $app->put('/users/{id:[0-9]+}', App\Controllers\APIController::class . ':create');
        $app->delete('/users/{id:[0-9]+}', App\Controllers\APIController::class . ':delete');
    });
});