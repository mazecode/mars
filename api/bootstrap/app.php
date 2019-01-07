<?php

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Load .ENV file
try {
    $dotenv = Dotenv\Dotenv::create(__DIR__ . '/../');
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

// Instantiate the app
$settings = require __DIR__ . '/../resources/config/app.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../app/dependencies.php';

// Register middleware
require __DIR__ . '/../app/middleware.php';

// Register routes
require __DIR__ . '/../routes/api.php';
require __DIR__ . '/../routes/web.php';