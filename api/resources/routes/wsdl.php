<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\WS\Tipo;

$app->group(
    '/wsdl',
    function () use ($app) {
        $app->get('/', function () {
            return 'Welcome to WebService version 1.0';
        });
        $app->get('/stock', App\Controllers\WebServiceController::class . ':stock');

        $app->get('/types', function () {
            echo Tipo::TERM . PHP_EOL;
        });
    }
);
