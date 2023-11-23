<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom css -->
    <link rel="stylesheet" href="self-css/general.css">
    <link rel="stylesheet" href="self-css/login.css">
    <link rel="stylesheet" href="../static/css/card-traveler.css">
    <link rel="stylesheet" href="../static/css/bg-dotted.css">
    <link rel="stylesheet" href="../static/css/in-focus.css">
    <link rel="stylesheet" href="../static/css/btn_type_A.css">
    <link rel="stylesheet" href="../static/css/form_slashing.css">

    <script src="../static/js/essentials.js" defer></script>
    <script src="../static/js/register.js" defer></script>    
    <title>Sabor Caro | Register</title>
</head>
<body class="bg-dotted">
<nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../extras/logos/logo.png" class="logo" alt="Gobernacion Antioquia">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li>
                        <a href="../index.php">
                            <button class="btn_type_A">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Regresar
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="form-container">
            <form action="" class="form" method="POST" id="regForm">
                <a class="navbar-brand logo_form" href="../index.php">
                    <img src="../extras/logos/logo.png" class="ans_logo" alt="logo">
                </a>
                <h2>Registrarse</h2>
                <div class="form-group">
                    <label for="user">Nuevo usuario</label>
                    <input type="text" name="user" id="user">
                </div>
                <div class="form-group">
                    <label for="user">Contraseña</label>
                    <input type="password" name="user" id="pass1">
                </div>
                <div class="form-group">
                    <label for="pass">Confirmar contraseña</label>
                    <input type="password" name="pass" id="pass2">
                </div>
                <p id="msg"></p>
                <button class="form-submit-btn" type="submit">Registrarse</button>
            </form>
            <p>¿Ya tienes cuenta? <a href="login.php" class="no-deco"><b></b>Ingresa aquí</a></p>
        </div>
    </main>
</body>
</html>
</html>