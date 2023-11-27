<?php 
function return_response($success, $mensaje, $route){
    $response['success'] = $success;
    $response['mensaje'] = $mensaje;
    $response['reboot'] = $route;
    $jsonResponse = json_encode($response);
    header('Content-Type: application/json');
    exit($jsonResponse);
}

?>