<?php

if (!isset($app)) {
    die('Where fuck you go buddy');
}

$container = $app->getContainer();

if (!isset($container)) {
    die('Where fuck you go buddy');
}

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
    return new \Respect\Validation\Validator();
};

// Jwt Middleware
$container['jwt'] = function ($c) {
    return new \Slim\Middleware\JwtAuthentication($c->get('settings')['jwt']);
};

// Illuminate Database 
$capsule = new \Illuminate\Database\Capsule\Manager;
$defaultDatabase = $container->get('settings')['database']['default'];
$capsule->addConnection($container->get('settings')['database']['connections']["{$defaultDatabase}"]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

if ($defaultDatabase === 'oracle') {
    $capsule->getDatabaseManager()->extend('oracle', function ($config) {
        $connector = new \yajra\Oci8\Connectors\OracleConnector();
        $connection = $connector->connect($config);
        $db = new \yajra\Oci8\Oci8Connection($connection, $config['database'], $config['prefix']);

        // set oracle session variables
        $sessionVars = [
            'NLS_TIME_FORMAT'         => 'HH24:MI:SS',
            'NLS_DATE_FORMAT'         => 'YYYY-MM-DD HH24:MI:SS',
            'NLS_TIMESTAMP_FORMAT'    => 'YYYY-MM-DD HH24:MI:SS',
            'NLS_TIMESTAMP_TZ_FORMAT' => 'YYYY-MM-DD HH24:MI:SS TZH:TZM',
            'NLS_NUMERIC_CHARACTERS'  => '.,',
        ];

        // Like Postgres, Oracle allows the concept of "schema"
        if (isset($config['schema'])) {
            $sessionVars['CURRENT_SCHEMA'] = $config['schema'];
        }

        
        $db->setSessionVars($sessionVars);

        return $db;
    });
}

$container['database'] = function ($c) use ($capsule) {
    return $capsule;
};

// Illumitate Schema  
$container['schema'] = function ($c) {
    return \Capsule::schema();
};

// Translator
$container['translator'] = function ($c) {
    $loader = new \Illuminate\Translation\FileLoader(new \Illuminate\Filesystem\Filesystem(), $c->get('settings')['translations']['translations_path']);

    return (new \Illuminate\Translation\Translator($loader, $c->get('settings')['default_locale']));
};

//Override the default Not Found Handler
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $response->withError('Where did you go butter hooker? Hahahaha', 404);
    };
};

$container['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $error) use ($c) {
        return $response->withError('Something went wrong!', 500);
    };
};
