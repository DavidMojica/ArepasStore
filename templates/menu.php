<!-- Imports -->
<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username']) || !$_SESSION['username']) {
    header('Location: login.php');
    exit();
}


include("../scriptsPHP/essentials.php");
include("../scriptsPHP/PDOconn.php");
$tipo_adicion = 2;

$query = "SELECT * FROM tbl_productos WHERE id_tipo = :tipo";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":tipo", $tipo_adicion, PDO::PARAM_INT);
$stmt->execute();
$adiciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <!-- fa icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../static/css/bg-dotted.css">
    <link rel="stylesheet" href="../static/css/btn-star.css">
    <link rel="stylesheet" href="../static/css/card-food.css">
    <link rel="stylesheet" href="self-css/menu.css">
    <link rel="stylesheet" href="self-css/general.css">
    <link rel="shortcut icon" href="../extras/logos/arepa.png" type="image/x-icon">
    <!-- custom JS -->
    <script src="../static/js/essentials.js" defer></script>
    <script src="../static/js/clases.js"></script>
    <script src="../static/js/menu.js" defer></script>

    <title>Sabor Caro | Menu</title>
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
                            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Menú</a></li>
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
    <main class="">
        <h2 class="col-white text-bold">Arepas</h2>
        <div class="arepas-grid" id="arepas-grid">
        
        </div>
    </main>

    <footer class="py-3 bg-dark">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Menú</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Carrito</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Pedidos</a></li>
        </ul>
        <p class="text-center text-light">© 2023 Sabor Caro</p>
    </footer>
</body>

</html>