<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    $this->logger->info("Slim-Skeleton '/' route");

    d((new App\Models\Descuento())->fake());

    return $this->renderer->render($response, 'index.phtml', $args);
});