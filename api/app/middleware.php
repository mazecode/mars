<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// $app->add(new \Slim\Csrf\Guard);
// $app->add(new App\Middlewares\Time);

// $app->add(new Tuupola\Middleware\CorsMiddleware([
//     "origin" => ["*", "http://localhost:4200"],
//     "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
//     "headers.allow" => ["Content-Type", "Accept", "X-Auth-Token", "Origin", "X-Requested-With", ],
//     "headers.expose" => [],
//     "credentials" => false,
//     "cache" => 0,
//     "logger" => $app->getContainer()['logger'],
//     "error" => function ($request, $response, $arguments) {
//         return $response
//             ->setError(true)
//             ->addMessage($arguments["message"])
//             ->withJson([], 505);
//     }
// ]));

$app->add(new App\Middlewares\JsonResponse);