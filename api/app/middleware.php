<?php

$app->add(new App\Middlewares\Time);
$app->add(new Tuupola\Middleware\CorsMiddleware([
    "origin" => ["*"],
    "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
    "headers.allow" => ["Authorization", "Content-Type", "Accept", "X-Auth-Token", "Origin", "X-Requested-With", ],
    "headers.expose" => [],
    "credentials" => false,
    "cache" => 0,
    "logger" => $app->getContainer()['logger'],
    "error" => function ($request, $response, $arguments) {
        return $response
            ->setError(true)
            ->addMessage($arguments["message"])
            ->withJson([], 505);
    }
]));
$app->add(new App\Middlewares\JsonResponse);
    
// https://github.com/oscarotero/psr7-middlewares
// $app->add(new \Slim\Csrf\Guard);