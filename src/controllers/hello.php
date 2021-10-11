<?php
use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace
// read table products

//endpoint 1
$app->get('/hello', function (Request $request, Response $response, 
array $arg){

 $response->getBody() -> write ("Hello World");
 return $response;
});

//endpoint 2

 $app->get('/hello/{name}', function (Request $request, Response $response, 
array $arg){
 $name = $arg['name'];
 $response->getBody() -> write ("$name");
 return $response;
});
