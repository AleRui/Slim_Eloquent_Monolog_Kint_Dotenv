<?php

use \Dotenv\Dotenv as Dotenv;

require '../../vendor/autoload.php';

Dotenv::create(__DIR__.'/../../')->load();

// Configuration
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,
        'debug' => true,
        'db' => [
            'driver' => getenv('DB_DRIVER'),
            'host' => getenv('DB_HOST'),
            'database' => getenv('DB_NAME'),
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PASS'),
            'charset' => getenv('DB_CHARSET'),
            'collation' => getenv('DB_COLLATION'),
            'prefix'    => getenv('DB_PREFIX'),
        ],
    ],
];

$app = new \Slim\App($configuration);

require "../app/dependencies.php";

// Route
require "../app/routes.php";

$app->run();
