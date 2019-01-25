<?php

$container = $app->getContainer();

$container['migration-table'] = 'migration';

// Error Handler
$container['errorHandler'] = function ($c) {
    return new \App\Exceptions\ErrorHandler($c['settings']['displayErrorDetails']);
};

// View renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];

    return new \Slim\Views\PhpRenderer($settings['template_path']);
};

// Monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

    return $logger;
};

$container['filesytem'] = function ($c) {
    return new \Illuminate\Filesystem\Filesystem;
};

$container['response'] = function ($c) {
    return new \App\Models\Response($c);
};

// Request Validator
$container['validator'] = function ($c) {
    \Respect\Validation\Validator::with('\\Conduit\\Validation\\Rules');

    // return new Conduit\Validation\Validator();
};

// Jwt Middleware
$container['jwt'] = function ($c) {
    $jws_settings = $c->get('settings')['jwt'];
    return new \Slim\Middleware\JwtAuthentication($jws_settings);
};

// Illuminate Database 
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['database']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['database'] = function ($c) use ($capsule) {
    return $capsule;
};

// Illumitate Schema  
$container['schema'] = function ($c) {
    return \Capsule::schema();
};

// Translator
$container['translator'] = function ($c) {
    $loader = new \Illuminate\Translation\FileLoader(new \Illuminate\Filesystem\Filesystem(), $c->get('settings')['translations_path']);

    return (new \Illuminate\Translation\Translator($loader, $c->get('settings')['default_locale']));
};