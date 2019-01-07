<?php
// d(isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/api.log');
return [
    'settings' => [
        "app" => [
            "name" => getenv('APP_NAME'),
        ],

        'displayErrorDetails' => getenv('APP_DEBUG') === 'true', // set to false in production
        'determineRouteBeforeAppMiddleware' => true,
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Database
        'db' => [
            'driver' => getenv('DB_CONNECTION',true) ? getenv('DB_CONNECTION') : 'mysql',
            'host' => getenv('DB_HOST',true) ? getenv('DB_HOST') : 'localhost',
            'database' => getenv('DB_DATABASE',true) ? getenv('DB_DATABASE') : __DIR__ . '/../../dummy.db',
            'username' => getenv('DB_USERNAME',true) ? getenv('DB_USERNAME') : '',
            'password' => getenv('DB_PASSWORD',true) ? getenv('DB_PASSWORD') : '',
            'charset' => getenv('DB_CHARSET',true) ? getenv('DB_CHARSET') : 'utf8',
            'collation' => getenv('DB_COLLATION',true) ? getenv('DB_COLLATION') : 'utf8_unicode_ci',
            'prefix' => getenv('DB_PREFIX',true) ? getenv('DB_PREFIX') :  '',
        ],

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../../resources/views',
        ],

        // Monolog settings
        'logger' => [
            'name' => getenv('APP_NAME') || 'app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];