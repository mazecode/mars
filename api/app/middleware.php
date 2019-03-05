<?php
 // dd( $container->get('settings')['translations']['default_locale']);
$app->add(new App\Middlewares\Locale(
    $container->get('translator'),
    $container->get('settings')['translations']['allowed_locales'],
    $container->get('settings')['translations']['default_locale']
));
$app->add(new App\Middlewares\URLInter);
$app->add(new App\Middlewares\Time);
$app->add(new App\Middlewares\JsonResponse);
$app->add(new Tuupola\Middleware\Cors([
    "origin" => ["*"],
    "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
    "headers.allow" => ["Authorization", "Content-Type", "Accept", "X-Auth-Token", "Origin", "X-Requested-With", ],
    "headers.expose" => [],
    "credentials" => false,
    "cache" => 0,
    "logger" => $container->get('logger'),
    "error" => function ($request, $response, $arguments) {
        return $response
            ->setError(true)
            ->addMessage($arguments["message"])
            ->withJson([], 505);
    }
]));

$app->add(new App\Middlewares\WebService);


