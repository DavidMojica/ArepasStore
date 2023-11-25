<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 1:
            if (isset($_POST['id'], $_POST['cantidad'], $_POST['nombre'], $_POST['precio'])) {
                $producto_id = $_POST['id'];
                $cantidad = $_POST['cantidad'];

                // Aquí puedes agregar la lógica necesaria para manejar el producto, como almacenarlo en el carrito.

                // Ejemplo básico de almacenamiento en la sesión
                $producto = array(
                    'id' => $producto_id,
                    'cantidad' => $cantidad,
                    'nombre' => $_POST['nombre'],
                    'precio' => $_POST['precio']
                );

                $_SESSION['carrito'][] = $producto;

                echo json_encode(['mensaje' => 'Producto agregado al carrito']);
            } else {
                echo json_encode(['error' => 'Faltan parámetros en la solicitud']);
            }

        case 2:
            $id = $_POST['id'];
            if (is_array($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $key => $producto) {
                    if ($producto['id'] == $id) {
                        // Remove the product from the cart
                        unset($_SESSION['carrito'][$key]);
                        break; // Stop the loop after finding and removing the product
                    }
                }
            }
            die();

        case 3:
            $producto_id = $_POST['id'];
            $cantidad = $_POST['cantidad'];

            if (isset($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as &$producto) {
                    if ($producto['id'] == $producto_id) {
                        $producto['cantidad'] = $cantidad;
                        break; 
                    }
                }
            }
    }
} else {
    echo json_encode(['error' => 'Error en la solicitud']);
}


// Verificar si las claves necesarias están presentes en $_POST
