<?php

// DEPENDECIES

//Add Dependencies Injector (DI)
$container = $app->getContainer();

// Log
$container['logger'] = function ($container) {
  $logger = new \Monolog\Logger('my_logger');
  $file_handler = new \Monolog\Handler\StreamHandler('./app.log');
  $logger->pushHandler($file_handler);
  return $logger;
};

// DB
$container['db'] = function ($container) {
  $db = $container['settings']['db'];
  $pdo = new PDO(
    $db['driver'] . ':host=' . $db['host'] . ';dbname=' . $db['database'],
    $db['username'],
    $db['password']
  );
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  return $pdo;
};

// Eloquent
$container['dbEloquent'] = function ($container) {
  $capsule = new \Illuminate\Database\Capsule\Manager;
  $capsule->addConnection($container['settings']['db']);

  $capsule->setAsGlobal();
  $capsule->bootEloquent();

  return $capsule;
};
