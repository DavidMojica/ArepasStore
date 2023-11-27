<?php
// Verificar si el usuario está autenticado
if (!isset($_SESSION['username']) || !$_SESSION['username']) {
    header('Location: login.php');
    exit();
}

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
    <link rel="stylesheet" href="self-css/pedidos.css">
    <link rel="stylesheet" href="../static/css/bg-dotted.css">
    <!-- Custom JS -->
    <script src="../static/js/clases.js" defer></script>
    
    
    <title>Sabor Caro | Admin</title>
</head>
<body>
    
</body>
</html>