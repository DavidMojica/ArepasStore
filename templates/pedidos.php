<?php
include("../scriptsPHP/PDOconn.php");
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = 0;
    $productos = $_SESSION['carrito'];
    $direccion = $_POST['direccion'];
    $nombreEntrega = $_POST['nombreEntrega'];
    $userid = $_SESSION['userid'];
    $estado = 0;

    //calcular el total desde el lado del servidor
    foreach( $productos as $prod ) {
        $total += $prod['precio'] * $prod['cantidad'];
    }

    $query = "INSERT INTO `tbl_pedidos`(`nombre_entregar`, `direccion`, `id_user`, `id_estado`, `valor_pedido`) VALUES (:nomb, :dir, :userid, :est, :valor);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":nomb", $nombreEntrega, PDO::PARAM_STR);
    $stmt->bindParam(":dir", $direccion, PDO::PARAM_STR);
    $stmt->bindParam(":userid", $userid, PDO::PARAM_INT);
    $stmt->bindParam(":est", $estado, PDO::PARAM_INT);
    $stmt->bindParam(":valor", $total, PDO::PARAM_INT);
    $stmt->execute();

    //obtener el id del pedido
    $lastInsert = $pdo->lastInsertId();

    foreach($productos as $p){
        $query = "INSERT INTO `tbl_productos_pedido`(`id_pedido`, `id_producto`) VALUES (':id_pedido',':id_producto')";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_pedido", $lastInsert, PDO::PARAM_INT);
        $stmt->bindParam(":id_producto", $p['id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor Caro | Pedidos</title>
</head>
<body>

    <?php 
    if (isset($productos) && is_array($productos) && !empty($productos)) {
        foreach ($productos as $p) {
            if (isset($p['nombre'])) {
                echo "<p>" . $p['id'] . "</p>";
            } else {
                echo "<p>Error: 'nombre' key not found in product</p>";
            }
        }
    } else {
        echo "<p>No products available</p>";
    }
    echo"<p>".$total ."</p>";
    
    ?>
    
</body>
</html>