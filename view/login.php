<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Gerente</title>

    <link rel="stylesheet" href="./css/menu.css">
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="continer-header">
            <img src="./img/logo-Saenz.jpeg" alt="">
            <h1>ESTUDIO JURIDICO SAENZ</h1>
            <img src="./img/csdjdh.png" alt="">
        </div>
    </header>

    <main>
        <div class="continer-main">
            <?php
            if (isset($_GET['user_type'])) {
                $user_type = $_GET['user_type']; // $user_type tendrá el valor "GERENTE" o "ADMINISTRADOR"
                echo "<h2 style=' text-transform: uppercase;'>BIENBENIDO &#10140; " . $user_type . " </h2>";
            }
            include "../model/conexion.php";
            include "../controller/validar.php"
            ?>
            <div class="login-user">
                <img src="./img/libra-icon.png" alt="">
                <div class="login-box">
                    <div class="title-box">
                        <h2>INICIAR SESION 
                            <?php
                                $objConexion = new conexionn();
                                $conexion = $objConexion->conectar();

                                $conexion->close();

                            ?>
                        </h2>
                    </div>
                    <div class="form-box">
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
                            </div>
                                <br>
                                <input class="btn" type="submit" name="ingreso" value="iniciar session" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="copyright">
            <p>&copy Copyright 2023</p>
        </div>
    </footer>
</body>

</html>