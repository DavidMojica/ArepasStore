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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="self-css/general.css">
    <link rel="stylesheet" href="../static/css/bg-dotted.css">
    <!-- Custom JS -->
    <script src="../static/js/clases.js" defer></script>
    <script src="../static/js/cart.js" defer></script>


    <title>Sabor Caro | Buycart</title>
</head>

<body class="bg-dotted">

    <div class="sticky-header">
        <div class="line-1">
            <p class="col-white text-bold">Precios baratos, sabor Caro y Colombiano <i class="fa fa-diamond"></i></p>
        </div>
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>
    <main>
        <h2 class="col-white text-bold">Carrito de compras</h2>

        <div class="table-responsive">
        <table class="table table-borderless table-dark">
            <thead class="table-active">
                <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">P/Unidad</th>
                <th scope="col">Precio</th>
                <th scope="col"><button class="btn btn-danger">Limpiar carro</button></th>
                </tr>
            </thead>
            <tbody id="cartBody">
            <?php
            session_start();

            if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])) {
                $productosEnCarrito = $_SESSION['carrito'];
                $total = 0;

                foreach ($productosEnCarrito as $producto) {
                    echo 
                        '<tr>
                            <th scope="row">'. $producto['nombre']  .' </th>
                            <td>'. $producto['cantidad'] .'</td>
                            <td>'. $producto['precio'] .'</td>
                            <td>'. $producto['cantidad'] * $producto['precio'] .'</td>
                            <td><button class="btn btn-warning">Quitar producto</button></th></td>
                        </tr>';
                    $total += $producto['cantidad'] * $producto['precio'];
                }
                echo'<tr class="table-active">
                <th scope="row">-</th>
                <td>-</td>
                <td>Total -></td>
                <td>'.$total .'</td>
                <td><button class="btn btn-success">Continuar al pago</button></th></td>
                </tr>';
            } else {
                echo '<p>El carrito está vacío.</p>';
            }
            ?>
            </tbody>
        </table>
        </div>


    </main>

    


</body>

</html>