<?php

// $app->add(new \Slim\Csrf\Guard);
// $app->add(new App\Middlewares\Time);

$app->add(new Tuupola\Middleware\CorsMiddleware([
    "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
    "error" => function ($request, $response, $arguments) {
        return $response
            ->setError(true)
            ->addMessage($arguments["message"])
            ->withJson($data, 505);
    }
]));

if($app->getContainer()->get('settings')['displayErrorDetails'] !== true) {
    $app->add(new App\Middlewares\JsonResponse);
}