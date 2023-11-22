<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom css -->
    <link rel="stylesheet" href="self-css/general.css">
    <link rel="stylesheet" href="self-css/login.css">
    <link rel="stylesheet" href="../static/css/card-traveler.css">
    <link rel="stylesheet" href="../static/css/bg-dotted.css">

    <script src="../static/js/login.js" defer></script>    
    <title>Sabor Caro | Login</title>
</head>
<body class="bg-dotted">
    <div class="sticky-header">
        <div class="line-1"></div>
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>
    <div class="griddly">
        <div class="card-traveler" id="l_card">
            <div class="first-content" id="first-content">
                <h2>Iniciar Sesion</h2>
                <form action="" id="login_form">
                    <img src="../extras/logos/logo.png" alt="" class="logo"> <br>
                    <input type="text" name="i_username" id="i_username" placeholder="Nombre de usuario"> <br>
                    <input type="password" name="i_password" id="i_password" placeholder="Contraseña"> <br>
                    <p id="msg"></p>
                    <button type="submit" name="i">Ingresar</button> 
                </form>
                <p>¿No tienes cuenta? <b id="b_change">Registrate aquí!</b></p>
            </div>
            <div class="second-content" id="second-content">
                <h2>Registrarse</h2>
                <form action="" id="register_form">
                    <img src="../extras/logos/logo.png" alt="" class="logo"> <br>
                    <p>¿Ya tienes cuenta? <b id="a_change">ingresa aquí</b></sp>
                    <input type="text" name="r_username" id="r_username" placeholder="Nombre de usuario">
                    <input type="password" name="r_password1" id="r_password1" placeholder="Contraseña">
                    <input type="password" name="r_password2" id="r_password2" placeholder="Conformar contraseña">
                    <button type="submit" name="r">Ingresar</button> 
                </form> 
            </div>
        </div>
    </div>
</body>
</html>