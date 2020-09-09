<?php
require_once('includes/initialize.php');

header('Content-Type: application/json; charset=UTF-8');

$response = array();

if(isset($_POST['id'])&&isset($_POST['name']) && isset($_POST['price']) && isset($_POST['qty'])){
    $id = $_POST['id'];
    $name =$_POST['name'];
    $price =$_POST['price'];
    $qty =$_POST['qty'];
    
    $result= $api->modifyproduct($id,$name,$price,$qty);
    if($result){
        $response['status'] ='00';
        $response['message'] ='Product modifed product succesfully';
    }else{
        $response['status'] ='06';
        $response['message'] ='Error modifed product product';
    }
    echo json_encode($response);
    
}else{
    $response['status'] ='99';
    $response['message'] ='Required parameter missing';

    echo json_encode($response);    
}
?>