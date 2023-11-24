<?php
include("PDOconn.php");
include("essentials.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    switch($action){
        case 1:
            $tipo_arepas = 1;
            $query = "SELECT * FROM tbl_productos WHERE id_tipo = :tipo";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":tipo", $tipo_arepas, PDO::PARAM_INT);
            if($stmt->execute()){
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return_response(true, "ok", $result); 
            }
            else{
                return_response(false,"","");
            }
            
    }

    
};
?>