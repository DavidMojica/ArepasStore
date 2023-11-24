<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

// Verificar si existe la clave 'carrito' en la sesión
if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])) {
    // Obtener la lista de productos del carrito
    $productosEnCarrito = $_SESSION['carrito'];

    // Iterar sobre los productos y mostrarlos
    foreach ($productosEnCarrito as $producto) {
        echo '<p>ID: ' . $producto['id'] . ', Cantidad: ' . $producto['cantidad'] . ', Nombre: ' . $producto['nombre'] . ', Precio: ' . $producto['precio'] . '</p>';
    }
} else {
    echo '<p>El carrito está vacío.</p>';
}
?>

    
</body>
</html>