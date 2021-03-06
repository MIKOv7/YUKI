<?php
use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace
//include productsProc.php file
include __DIR__ . '../productsProc.php';
//read table products
$app->get('/products', function (Request $request, Response $response, array
$arg){
 return $this->response->withJson(array('data' => 'success'), 200);
});
//request table products by condition
$app->get('/products/[{id}]', function ($request, $response, $args){
 
    $productId = $args['id'];
    if (!is_numeric($productId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
    }
    $data = getProduct($this->db,$productId);
    if (empty($data)) {
    return $this->response->withJson(array('error' => 'no data'), 500);
   }
    return $this->response->withJson(array('data' => $data), 200);
   });

   //new function
   $app->post('/products/add', function ($request, $response, $args) {
    $form_data = $request->getParsedBody();
    $data = createProduct($this->db, $form_data);
    if ($data <= 0) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
   );
   
