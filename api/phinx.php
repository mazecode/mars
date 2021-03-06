<?php

require_once './vendor/autoload.php';

defined('DS') ? : define('DS', DIRECTORY_SEPARATOR);
defined('ROOT') ? : define('ROOT', dirname(__DIR__) . DS . 'api' . DS);

if (file_exists(ROOT . '.env')) {
    try {
        $dotenv = Dotenv\Dotenv::create(ROOT);
        $dotenv->load();
    } catch (Dotenv\Exception\InvalidPathException $e) {
        //
    }
}

$settings = require 'app/settings.php';

$app = new \Slim\App($settings);
$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['database']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['database'] = function ($c) use ($capsule) {
    return $capsule;
};

$config = $container->get('settings')['database'];

return [
    'paths' => [
        'migrations' => 'database/migrations',
        'seeds' => 'database/seeds',
    ],
    'migration_base_class' => 'BaseMigration',
    'templates' => [
        'class' =>  'CreateTableTemplateGenerator', // 'TemplateGenerator',
    ],
    'aliases' => [
        'create' => 'CreateTableTemplateGenerator',
    ],

    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'development',
        'development' => [
            'name' => $config['database'],
            'adapter' => 'sqlite',
            'suffix' => '.db'
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