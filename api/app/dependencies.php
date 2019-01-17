<?php
// DIC configurationd

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];

    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

    return $logger;
};

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['database']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['database'] = function ($c) use ($capsule) {
    return $capsule;
};

use Phpmig\Adapter;
$container['phpmig.adapter'] = function($c) {
    new Adapter\Illuminate\Database($c['database'], 'migrations');
};
$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';


// $container['phpmig.migrations_template_path'] = $container['phpmig.migrations_path'] . DIRECTORY_SEPARATOR . '.template.php';

// I can run this directly, because Capsule is set as globally
$container['schema'] = function ($c) {
    return Capsule::schema();
};

// Rewrite Response Object
$container['response'] = function ($c) {
    return new \App\Models\Response($c);
};