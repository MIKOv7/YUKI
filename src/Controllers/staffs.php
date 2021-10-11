<?php
use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

include __DIR__ . '/function/sqlf.php';

//read data
$app->get('/staffs', function (Request $request, Response $response, array
$arg){
 return $this->response->withJson(array('data' => 'success'), 200);
});

//get method
$app->get('/staffs/[{id}]', function ($request, $response, $args){
 
 $staffs = $args['id'];
 if (!is_numeric($staffs)) {
 return $this->response->withJson(array('error' => 'wrong parameter'), 500);
 }
 $data = getstaff($this->db,$staffs);
 if (empty($data)) {
 return $this->response->withJson(array('error' => 'no data'), 500);
}
 return $this->response->withJson(array('data' => $data), 200);
});

//delete method
$app->delete('/staffs/del/[{id}]',
function ($request, $response, $args){

    $staffs = $args['id'];
    if (!is_numeric($staffs)) {
        return $this->response->withJson(array('error' => 'wrong syntax'), 500);
        }
        $data = deletestaff($this->db,$staffs);

    if (empty($data)) {
        return $this->response->withJson(array('data ' => ' data deleted '), 200);
}});


//post method 
$app->post('/staffs/add', function ($request, $response, $args){
 
    $form_data = $request->getParsedBody();
    
    
    $data = addstaff($this->db,$form_data);
    if ($data <= 0) {
    return $this->response->withJson(array('error' => 'add data field'), 500);
   }
    return $this->response->withJson(array('data' => 'success'), 200);
   });

//put method 
$app->put('/staffs/put/[{id}]', function ($request,  $response,  $args){
    $staffs = $args['id'];
    
    
   if (!is_numeric($staffs)) {
      return $this->response->withJson(array('error' => 'data required'), 422);
   }
    $form_data=$request->getParsedBody();
    
  $data=updatestaff($this->db,$form_data,$staffs);
  
  if ($data <=0){
  return $this->response->withJson(array('data' => 'data updated'), 200);}
});