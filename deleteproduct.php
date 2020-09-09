<?php
require_once('includes/initialize.php');

header('Content-Type: application/json; charset=UTF-8');

$response = array();

if(isset($_POST['id'])){
    $id = $_POST['id'];
   
    
    $result= $api->deleteProduct($id);
    if($result){
        $response['status'] ='00';
        $response['message'] ='Product deleted product succesfully';
    }else{
        $response['status'] ='06';
        $response['message'] ='Error deleted product ';
    }
    echo json_encode($response);
    
}else{
    $response['status'] ='99';
    $response['message'] ='Required parameter missing';

    echo json_encode($response);    
}
?>