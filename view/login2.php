<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="css/login.css" rel="stylesheet">

</head>

<body background="img/im1.jpg">
    <?php
    if (isset($_GET['user_type'])) {
        $user_type = $_GET['user_type']; // $user_type tendrá el valor "GERENTE" o "ADMINISTRADOR"
        echo "<h1>EL TIPO DE USUARIO ES: " . $user_type . "</h1>";
    }

    ?>
    <div class="login-box">
        <h2>INICIAR SESION
            <?php
            require __DIR__ . "/../model/conexion.php";
            require __DIR__ . "/../controller/validar.php";
            ?>
        </h2>


        <form method="POST" acction="controler/validar.php ">
            <input type="hidden" name="user_type" value="<?php echo $user_type; ?>">
            <div class="user-box">
                <input type="text" name="user" required="" placeholder="">
                <label>Usuario</label>
            </div>
            <div class="user-box">
                <input type="password" name="clave" required="" placeholder="">
                <label>contraseña</label>
            </div>
            <div>
                <h4><a href="https://www.facebook.com/" target="_blank">Olvidaste tu contraseña?</a></h4>
                </di>
                <br>
                <input class="btn" type="submit" name="ingreso" value="iniciar session" href>
        </form>
    </div>
</body>

</html>