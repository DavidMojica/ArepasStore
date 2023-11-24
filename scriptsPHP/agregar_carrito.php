<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agrega_al_carrito'])) {
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
    echo json_encode(['error' => 'Error en la solicitud']);
}
?>
