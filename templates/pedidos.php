<?php
include("PDOconn.php");
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = 0;
    $productos = $_SESSION['carrito'];
    $direccion = $_POST['direccion'];
    $nombreEntrega = $_POST['nombreEntrega'];

    //calcular el total desde el lado del servidor
    foreach( $productos as $prod ) {
        $total += $prod['precio'];
    }

    $query = "INSERT INTO `tbl_pedidos`(`nombre_entregar`, `direccion`, `id_user`, `id_estado`) VALUES (:nomb,:dir,:userid,:est);";
    $stmt = $pdo->prepare($query);

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    if (isset($productos) && is_array($productos) && !empty($productos)) {
        foreach ($productos as $p) {
            if (isset($p['nombre'])) {
                echo "<p>" . $p['nombre'] . "</p>";
            } else {
                echo "<p>Error: 'nombre' key not found in product</p>";
            }
        }
    } else {
        echo "<p>No products available</p>";
    }
    echo"<p>". $direccion."</p>";
    
    ?>
    
</body>
</html>