<!-- Imports -->
<?php
include("../scriptsPHP/essentials.php");
include("../scriptsPHP/PDOconn.php");
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
    <link rel="stylesheet" href="../static/css/bg-col.css">
    <link rel="stylesheet" href="../static/css/btn-star.css">
    <link rel="stylesheet" href="../static/css/card-food.css">
    <link rel="stylesheet" href="self-css/general.css">
    <link rel="stylesheet" href="self-css/menu.css">
    <link rel="shortcut icon" href="extras/logos/arepa.png" type="image/x-icon">

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
            <nav class="navbar navbar-expand-lg navbar_d2">
                <div class="container cont_top">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="#" class="nav-link px-2">Home</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2">Menú</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2">Carrito</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2">Pedidos</a></li>
                            <li class="nav-item m-1">
                                <a href="templates/login.php"><button class="btn btn-danger">Cerrar sesión</button></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <main class="">
        <div class="card-food col-md-4">
            <div class="content-food">
                <div class="back-food">
                    <div class="back-food-content">
                        
                        <img src="../extras/resources/arepa-carne.jpg" alt="comida">
                        
                        <strong>Arepa con chorizo</strong>
                    </div>
                </div>
                <div class="front-food">

                    <div class="img-food">
                        <div class="circle-food">
                        </div>
                        <div class="circle-food" id="right">
                        </div>
                        <div class="circle-food" id="bottom">
                        </div>
                    </div>

                    <div class="front-content">
                        <small class="badge">Arepa con chorizo</small>
                        <div class="description-food">
                            <div class="title-food">
                                <p class="title-food">
                                    <strong>$10000</strong>
                                </p>
                                <svg fill-rule="nonzero" height="15px" width="15px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                    <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997">
                                        <g transform="scale(8,8)">
                                            <path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <p class="card-food-footer">
                                30 Mins &nbsp; | &nbsp; Disponible
                            </p>
                        </div>
                        <form action="" class="form-food">
                            <input type="number" name="" id="" value="1" min="1" max="10">
                            <button type="submit">Agregar al carrito</button>
                        </form>


                    </div>
                </div>
            </div>
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