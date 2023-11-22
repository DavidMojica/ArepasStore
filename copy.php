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
    <link rel="stylesheet" href="static/css/background-grid.css">
    <link rel="stylesheet" href="templates/self-css/general.css">
    <link rel="stylesheet" href="templates/self-css/index.css">
    
    <title>Sabor Caro | Inicio</title>
</head>

<body class="bg-grid">
    <div class="div_top">
        <div class="line-1">
            <p class="col-white text-bold">Precios baratos, sabor Caro y Colombiano <i class="fa fa-diamond"></i></p>
        </div>
        <div class="line-2"></div>
        <div class="line-3"></div>
        <nav class="navbar navbar-expand-lg navbar_d2">
            <div class="container cont_top">
                <a href="#" class="logo-cont navbar-brand">
                    <img src="extras/logos/logo.png" alt="Arepas con sabor caro" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item m-1">
                            <a href="templates/menu.php" class="nav-link px-2 text-muted">Menu</a>
                        </li>
                        <?php  #Comprobar que la sesión esté iniciada para mostar una cosa o otra.
                        session_start();
                        if (!isset($_SESSION['username'])) {
                        ?>
                        <li class="nav-item m-1">
                            <a href="templates/login.php"><button>Iniciar sesión</button></a>
                        </li>
                        <?php
                        } else {
                        ?>
                        <li class="nav-item m-1">
                            <a href="templates/login.php"><button>Menú</button></a>
                        </li>
                        <li class="nav-item m-1">
                            <a href="templates/login.php"><button>Cerrar sesión</button></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main class="">
        <!-- Swipper -->
        <div class="giant_logo col-xl-8">
            <img src="extras/logos/logo.png" alt="Sabor Caro">
        </div>

        <div class="row gap-3 justify-content-center col-xl-4">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h3>Agenda tu pedido!</h3>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
                <button>Registrarse</button>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
                <button>Iniciar sesión</button>
            </div>
        </div>
    </main>

    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Menú</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Carrito</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pedidos</a></li>
        </ul>
        <p class="text-center text-muted">© 2023 Sabor Caro</p>
    </footer>
</body>
</html>