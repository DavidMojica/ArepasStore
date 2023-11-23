<?php
include("PDOconn.php");
include("essentials.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $node = $_POST['node'];

    switch ($node) {
        case 1: 
            $query = "SELECT * FROM tbl_user WHERE username = :username AND pass = :pass";
            $stmt = $pdo->prepare($query);
            $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);
            $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);
            $pass_hash = hash('sha256', $pass);
            $stmt->bindParam(':username', $user, PDO::PARAM_STR); 
            $stmt->bindParam(':pass', $pass_hash, PDO::PARAM_STR);
            $stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($result) == 1){
                try{
                    session_start();
                    $_SESSION['username'] = $user;
                    return_response(true, $result, "../templates/menu.php");
                }
                catch(Exception $e){
                    return_Response(false, $e, "../templates/login.php");
                }
            }
            else if(count($result) == 0)
                #No se devolvieron filas.
                $queryError = "Usuario no encontrado.";
            else if(count($result) <= 2)
                #Se devolvieron múltiples files.
                $queryError = "Multiples coincidencias. Contacte con la administración.";      
            else
                #Error desconocido.
                $queryError = "Error desconocido devuelto en la consulta";   

            if($queryError !== "error"){
                return_Response(false, $queryError, "../templates/login.php");
            }
            else{
                return_Response(false, $queryError, "../templates/login.php");
            }
            break;
        case 2: 
            $query = "INSERT INTO `tbl_user`(`username`, `pass`, `num_pedidos`, `id_tipo_usuario`) VALUES (:username, :pass, :num_pedidos, :id_tipo_usuario)";
            $stmt = $pdo->prepare($query);
            $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);
            $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);
            $pass_hash = hash('sha256', $pass);
            $num_pedidos = 0;
            $id_tipo_usuario = 1;

            $stmt->bindParam(':username', $user, PDO::PARAM_STR); 
            $stmt->bindParam(':pass', $pass_hash, PDO::PARAM_STR);
            $stmt->bindParam(':num_pedidos', $num_pedidos, PDO::PARAM_INT);
            $stmt->bindParam(':id_tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
            
            try{
                $stmt->execute();
                return_response(true,'Usuario creado', "../templates/login.php");
            } 
            catch (PDOException $e) {
                return_Response(false, $e, "../templates/register.php");
            }
            break;
        default:
            die();
    }
}
?>