<?php
include("../scriptsPHP/PDOconn.php");
session_start();

// Proteger la ruta
if (!isset($_SESSION['username']) || !$_SESSION['username']) {
    header('Location: login.php');
    exit();
}

$userid = $_SESSION['userid'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = 0;
    $productos = $_SESSION['carrito'];
    $direccion = $_POST['direccion'];
    $nombreEntrega = $_POST['nombreEntrega'];
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
    <link rel="stylesheet" href="self-css/pedidos.css">
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
        $query = "SELECT p.`id`, p.`nombre_entregar`, p.`direccion`, e.`nombre` as nomEstado, p.`valor_pedido`
        FROM `tbl_pedidos` p
        JOIN `tbl_estados` e ON p.`id_estado` = e.`id`
        WHERE p.`id_user` = :userid";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":userid", $userid, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="table-responsive">
        <table class="table table-borderless table-dark">
            <thead class="table-active">
                <tr>
                <th scope="col">ID del pedido</th>
                <th scope="col">Entregado a:</th>
                <th scope="col">Dirección del pedido:</th>
                <th scope="col">Estado del pedido:</th>
                <th scope="col">Valor del pedido</th>
                <th scope="col">Productos</th>
                </tr>
            </thead>
            <tbody id="cartBody">
            <?php
            foreach ($result as $row) {
                $idPedido = $row['id'];

                $query = 'SELECT pp.`id_pedido`, p.`nombre` as nombre
                FROM `tbl_productos_pedido` pp
                JOIN `tbl_productos` p ON pp.`id_producto` = p.`id`
                WHERE pp.`id_pedido` = :idPedido';
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':idPedido', $idPedido, PDO::PARAM_INT);
                $stmt->execute();
                $resultProd = $stmt->fetchAll(PDO::FETCH_ASSOC);

                echo "<tr>
                        <th scope='row'>" . $idPedido . "</th>
                        <td>" . $row['nombre_entregar'] . "</td>
                        <td>" . $row['direccion'] . "</td>
                        <td>" . $row['nomEstado'] . "</td>
                        <td>$ " . $row['valor_pedido'] . "</td>
                        <td>";

                foreach ($resultProd as $rp) {
                    echo "<p>" . $rp['nombre'] . "</p>";
                }
                echo "</td></tr>";
            }
            ?>
            </tbody>
        </table>
        </div>
    </main>
</body>
</html>