<!-- Imports -->
<?php
include("scriptsPHP/essentials.php");
include("scriptsPHP/PDOconn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fa icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="static/css/bg-col.css">
    <link rel="stylesheet" href="templates/self-css/general.css">
    <link rel="stylesheet" href="templates/self-css/index.css">

    <title>Sabor Caro | Inicio</title>
</head>

<body>
    <div class="sticky-header">
        <div class="line-1">
            <p class="col-white text-bold">Precios baratos, sabor Caro y Colombiano <i class="fa fa-diamond"></i></p>
        </div>
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>

    <div class="bg-blurry">
        <div class="div_top">
            <nav class="navbar navbar_d2">
                <div class="container cont_top">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <?php
                            session_start();
                            if (!isset($_SESSION['username'])) {
                            ?>
                                <li class="nav-item m-1">
                                    <a href="templates/login.php"><button class="btn btn-primary">Iniciar sesión</button></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="nav-item m-1">
                                    <a href="templates/login.php"><button class="btn btn-danger">Cerrar sesión</button></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>


            <section class="griddle">
                <div class="row quarry">
                    <img src="extras/logos/logo.png" alt="Sabor Caro" class="logo">
                    <h1 class="col-white text-bold">AREPAS CON TODO!</h1>
                    <button>HAZ TU PEDIDO</button>
                </div>
            </section>
        </div>
    </div>
    
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