<?php
include("essentials.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 1:
            if (isset($_POST['id'], $_POST['cantidad'], $_POST['nombre'], $_POST['precio'])) {
                $producto_id = $_POST['id'];
                $cantidad = $_POST['cantidad'];

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
            break;

        case 2:
            $id = $_POST['id'];
            if (is_array($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $key => $producto) {
                    if ($producto['id'] == $id) {
                        unset($_SESSION['carrito'][$key]);
                        break;
                    }
                }
            }
            break;

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
            break;

        case 4:
            if (isset($_SESSION['carrito'])) {
                return_response(true, "ok", json_encode(array_values($_SESSION['carrito'])));
            } else {
                return_response(false, "no", null);
            }
            break;

        case 5:
            if (isset($_SESSION['carrito'])) {
                // Eliminar todos los elementos del carrito
                $_SESSION['carrito'] = array();
            }
            break;
        default:
            break;
    }
} else {
    echo json_encode(['error' => 'Error en la solicitud']);
}


// Verificar si las claves necesarias están presentes en $_POST
