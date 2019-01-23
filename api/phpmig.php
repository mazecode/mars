<?php

require_once './vendor/autoload.php';
$settings = require './src/settings.php';
$app = new \Slim\App($settings);
$container = $app->getContainer();
$container->register(new \Conduit\Services\Database\EloquentServiceProvider());
$config = $container['settings']['database'];
return [
    'paths' => [
        'migrations' => 'database/migrations',
        'seeds' => 'database/seeds',
    ],
    'migration_base_class' => 'BaseMigration',
    'templates' => [
        'class' => 'TemplateGenerator',
    ],
    'aliases' => [
        'create' => 'CreateTableTemplateGenerator',
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'development',
        'development' => [
            'name' => $config['database'],
            'connection' => $container->get('db')->getConnection()->getPdo(),
        ],
        'production' => [
            'adapter' => $config['driver'],
            'host' => $config['host'],
            'name' => $config['database'],
            'user' => $config['username'],
            'pass' => $config['password'],
            'port' => $config['port'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
    ],
];

// require_once 'vendor/autoload.php';

// use Phpmig\Adapter;
// use Illuminate\Database\Capsule\Manager as Capsule;

// $config = require_once 'resources/config/app.php';
// $capsule = new Capsule;
// $capsule->addConnection($config['settings']['database']);
// $capsule->setAsGlobal();
// $capsule->bootEloquent();

// $path = __DIR__ . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations';

// $container = new ArrayObject();

// // replace this with a better Phpmig\Adapter\AdapterInterface
// // $container['phpmig.adapter'] = new Adapter\Illuminate\Database($capsule, 'migrations');
// $container['phpmig.adapter'] = new Adapter\File\Flat($path . '/.migrations.log');
// $container['phpmig.migrations_path'] = $path;

// $container['schema'] = function ($c) {
//     return Capsule::schema();
// };

// // You can also provide an array of migration files
// // $container['phpmig.migrations'] = array_merge(
// //     glob('migrations_1/*.php'),
// //     glob('migrations_2/*.php')
// // );

// return $container;