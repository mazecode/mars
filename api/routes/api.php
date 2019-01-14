<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->group('/api', function () use ($app) {
    
    $app->post('/logs', function (Request $request, Response $response, array $args) {
        $this->logger->info('API');
        $this->logger->info((string)$response->getBody());
    });

    $app->group('/v1', function () use ($app) {
        $app->post('/login', App\Controllers\LoginController::class . ':login');

        // Tool Users
        $app->group('/users', function () use ($app) {
            $app->get('', App\Controllers\UserController::class . ':index');
            $app->get('/{id:[0-9]+}', App\Controllers\UserController::class . ':get');
            $app->post('', App\Controllers\UserController::class . ':create');
            $app->put('/{id:[0-9]+}', App\Controllers\UserController::class . ':update');
            $app->delete('/{id:[0-9]+}', App\Controllers\UserController::class . ':delete');
        })->add(App\Middlewares\Auth::class);
    });
});