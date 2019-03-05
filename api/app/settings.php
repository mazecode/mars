<?php

isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/api.log';

return [
    'constants' => [
        'masterPassword' => 'm4r5p4r4t0d0s_2oi7',
    ],
    'settings' => [
        /**
         * General Settings
         */
        'displayErrorDetails' => getenv('APP_DEBUG') === 'true', // set to false in production
        'determineRouteBeforeAppMiddleware' => true,
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        /**
         * App Settings
         */
        "app" => [
            'name' => getenv('APP_NAME'),
            'url' => getenv('APP_URL', true) ? getenv('APP_URL', true) : 'http://localhost',
            'env' => getenv('APP_ENV'),
        ],



        /**
         * Database Settings
         */
        'database' => [
            'default' => getenv('DB_CONNECTION') ?: 'sqlite',

            'connections' => [
                'sqlite' => [
                    'driver' => 'sqlite',
                    'host' => getenv('DB_HOST') ?: 'localhost',
                    'database' => __DIR__ . '/../database/' . (getenv('DB_DATABASE') ?: 'dummy.db'),
                ],

                'mysql' => [
                    'driver' => 'mysql',
                    'host' => getenv('DB_HOST') ?: 'localhost',
                    'database' => getenv('DB_DATABASE') ?: __DIR__ . '/../database/dummy.db',
                    'username' => getenv('DB_USERNAME') ?: '',
                    'password' => getenv('DB_PASSWORD') ?: '',
                    'charset' => getenv('DB_CHARSET') ?: 'utf8',
                    'collation' => getenv('DB_COLLATION') ?: 'utf8_unicode_ci',
                    'prefix' => getenv('DB_PREFIX') ?: '',
                ],

                'oracle' => [
                    'driver' => 'oracle',
                    'host' => getenv('DB_HOST') ?: 'oracle.host',
                    'port' => getenv('DB_PORT')  ?: '1521',
                    'database' => getenv('DB_DATABASE') ?: 'xe',
                    'service_name' => getenv('DB_SID_ALIAS') ?: 'sid_alias',
                    'username' => getenv('DB_USERNAME') ?: '',
                    'password' => getenv('DB_PASSWORD') ?: '',
                    'charset' => getenv('DB_CHARSET') ?: '',
                    'prefix' => getenv('DB_PREFIX') ?: '',
                ]
            ]
        ],

        /**
         * Renderer Settings
         */
        'renderer' => [
            'template_path' => __DIR__ . '/../resources/views',
        ],

        /**
         * Monolog Settings
         */
        'logger' => [
            'name' => getenv('APP_NAME') || 'app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        /**
         * Translation Settings
         */
        'translations' => [
            'allowed_locales' => ['en', 'es', 'it', 'nl', 'pt'],
            'default_locale' => 'es',
            'translations_path' => __DIR__ . '/../resources/translations/',
        ],
        /**
         * Web Service Settings
         */
        'ws' => [
            'url' => ''
        ],
    ],
];
