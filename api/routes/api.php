<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->group('/api/{locale}', function () use ($app) {
    
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
        });
        // ->add(App\Middlewares\Auth::class);

        // Tool Users
        $app->group('/discounts', function () use ($app) {
            $app->get('', App\Controllers\DiscountController::class . ':index');
            $app->get('/{id:[0-9]+}', App\Controllers\DiscountController::class . ':get');
            $app->post('', App\Controllers\DiscountController::class . ':create');
            $app->put('/{id:[0-9]+}', App\Controllers\DiscountController::class . ':update');
            $app->delete('/{id:[0-9]+}', App\Controllers\DiscountController::class . ':delete');
        });
        // ->add(App\Middlewares\Auth::class);

        $app->group('/rates', function () use ($app) {
            $app->get('', App\Controllers\RateController::class . ':index');
            $app->get('/{id:[0-9]+}', App\Controllers\RateController::class . ':get');
            $app->post('', App\Controllers\RateController::class . ':create');
            $app->put('/{id:[0-9]+}', App\Controllers\RateController::class . ':update');
            $app->delete('/{id:[0-9]+}', App\Controllers\RateController::class . ':delete');
        });
        // ->add(App\Middlewares\Auth::class);
    });
});