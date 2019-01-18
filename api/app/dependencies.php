<?php

use Phpmig\Adapter;

$container = $app->getContainer();

// View renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];

    // $view = new Slim\Views\Twig($container->get('settings')['view_path']);
    // // Instantiate and add Slim specific extension
    // $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    // $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));
    // $settings = $container->get('settings');
    // // add translator functions to Twig
    // $view->addExtension(
    //     new App\Twig\TranslatorExtension($container->get('translator'), $settings['allowed_locales'])
    // );
    // return $view;

    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// Monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

    return $logger;
};

// Illuminate Database 
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['database']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['database'] = function ($c) use ($capsule) {
    return $capsule;
};

// Migrations
$container['phpmig.adapter'] = function ($c) {
    new Adapter\Illuminate\Database($c->get('settings')['database'], 'migrations');
};
$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';
// $container['phpmig.migrations_template_path'] = $container['phpmig.migrations_path'] . DIRECTORY_SEPARATOR . '.template.php';

// Illumitate Schema  
$container['schema'] = function ($c) {
    return Capsule::schema();
};

// Response
$container['response'] = function ($c) {
    return new \App\Models\Response($c);
};

// Translator
$container['translator'] = function ($c) {
    $loader = new Illuminate\Translation\FileLoader(new Illuminate\Filesystem\Filesystem(), $c->get('settings')['translations_path']);

    return (new Illuminate\Translation\Translator($loader, $c->get('settings')['default_locale']));
};