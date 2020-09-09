<?php
require_once('includes/initialize.php');

header('Content-Type: application/json; charset=UTF-8');

$response = array();

$result = $api->getAllProducts();

if (count($result) > 0) {
    $response['status'] = '00';
    $response['message'] = 'Operation successful';
    $response['products'] = $result;
} else {
    $response['status'] = '06';
    $response['message'] = 'Error in Operation ';
}

echo json_encode($response);
?>