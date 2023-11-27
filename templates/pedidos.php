<?php
include("../scriptsPHP/PDOconn.php");
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = 0;
    $productos = $_SESSION['carrito'];
    $direccion = $_POST['direccion'];
    $nombreEntrega = $_POST['nombreEntrega'];
    $userid = $_SESSION['userid'];
    $estado = 1;

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
        $query = "INSERT INTO `tbl_productos_pedido`(`id_pedido`, `id_producto`) VALUES (:id_pedido,:id_producto)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_pedido", $lastInsert, PDO::PARAM_INT);
        $stmt->bindParam(":id_producto", $p['id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    header("Location: pedidos.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- favicon -->
    <link rel="shortcut icon" href="../extras/logos/arepa.png" type="image/x-icon">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="self-css/general.css">
    <link rel="stylesheet" href="../static/css/bg-dotted.css">
    <!-- Custom JS -->
    <script src="../static/js/clases.js" defer></script>
    <title>Sabor Caro | Pedidos</title>
</head>
<body class="bg-dotted">
    <div class="sticky-header">
        <div class="line-1">
            <p class="col-white text-bold">Precios baratos, sabor Caro y Colombiano <i class="fa fa-diamond"></i></p>
        </div>
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>
    <div class="div_top">
        <nav class="navbar navbar-expand-lg navbar_d2">
            <div class="container cont_top">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="../index.php" class="nav-link px-2 text-light">Home</a></li>
                        <li class="nav-item"><a href="menu.php" class="nav-link px-2 text-light">Menú</a></li>
                        <li class="nav-item"><a href="cart.php" class="nav-link px-2 text-light">Carrito</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Pedidos</a></li>
                        <li class="nav-item m-1">
                            <form action="../scriptsPHP/logout.php" method="post">
                                <button class="btn btn-danger">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
        <h2 class="col-white text-bold">Sus pedidos:</h2>
        <?php
        $query = "SELECT `id`, `nombre_entregar`, `direccion`, `id_estado`, `valor_pedido` FROM `tbl_pedidos` WHERE id_user = :userid";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":userid", $userid, PDO::PARAM_INT);
        $stmt->execute();
        
        ?>

    </main>
</body>
</html>