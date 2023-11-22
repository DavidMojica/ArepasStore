<?php 
function return_response($success, $mensaje){
    $response['success'] = $success;
    $response['mensaje'] = $mensaje;
    $jsonResponse = json_encode($response);
    header('Content-Type: application/json');
    exit($jsonResponse);
}


?>