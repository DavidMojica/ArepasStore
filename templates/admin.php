<?php
include("../scriptsPHP/PDOconn.php");
session_start();
// Proteger ruta
if (!isset($_SESSION['username']) || !$_SESSION['username'] || $_SESSION['usertype'] != 2) {
    header('Location: login.php');
    exit();
}

$query = "SELECT p.`id`, p.`nombre_entregar`, p.`direccion`, p.`id_estado`, p.`valor_pedido`
        FROM `tbl_pedidos` p
        JOIN `tbl_estados` e ON p.`id_estado` = e.`id`
        ORDER BY p.`id` ASC";
$stmt = $pdo->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM tbL_estados";
$stmt = $pdo->prepare($query);
$stmt->execute();
$estados = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="self-css/centerTable.css">
    <link rel="stylesheet" href="../static/css/bg-dotted.css">
    <!-- Custom JS -->
    <script src="../static/js/admin.js" defer></script>

    <title>Sabor Caro | Admin</title>
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
        <h2 class="col-white text-bold">Panel de administración</h2>
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
                        <td>"; ?>
                        <select name='estado' class="changers form-select" data-idpedido="<?php echo $idPedido; ?>">
                            <?php
                            foreach ($estados as $est) {
                                $selected = ($est["id"] == $row["id_estado"]) ? "selected" : "";
                                echo "<option value='{$est['id']}' $selected>{$est['nombre']}</option>";
                            }
                            ?>
                        </select>
                        </td>
                        <td>$<?php echo $row['valor_pedido']; ?></td>
                        <td> <?php

                                foreach ($resultProd as $rp) {
                                    echo "<p>" . $rp['nombre'] . "</p>";
                                }
                                echo "</td></tr>";
                            }?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>