<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/test', function (Request $request, Response $response, array $args) {
  //
  // Dependencies
  //
  // LOG
  if ($this->has('logger')) {
    //d($this->logger);
    $this->logger->info('My logger is now ready');
  }
  //
  // Dependencie DB
  if ($this->has('db')) {
    $sql = "SELECT * FROM clientes";
    $connectionDB = $this->db;
    $query = $connectionDB->prepare($sql);
    $query->execute();
    $clientes = $query->fetch();
    d($clientes);
    $connectionDB = null;
  }
  //
  // Dependencie Eloquent
  if ($this->has('dbEloquent')) {
    $eloquent = $this->dbEloquent;
    $table = $eloquent->table('clientes');;
    d($table->get());
  }
  //
  // PSR-7 Interfaz
  //
  // Request
  $myRequest = $request->getHeader('Accept');
  //
  // Response
  $status = $response->getStatusCode();
  //
  $myResponse = 'Respuesta<br>';
  $myResponse .= '<pre>' . print_r($myRequest) . '</pre><br>';
  $myResponse .= $status . '<br>';
  //
  $response->getBody()->write($myResponse);
  //
  return $response;
});
