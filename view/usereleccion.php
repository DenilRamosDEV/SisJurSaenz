<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAENZ</title>
    <link rel="stylesheet" href="./css/usereleccion.css">
</head>

<body background="img/im1.jpg">
    <header>
        <p>ESTUDIO JURÍDICO SAENZ</p>
    </header>
    <h3>INICIAR SESION COMO:</h3>
    <div class="login-box">
        <form method="get" action="login.php">
            <div class="user-box">
                <h1>GERENTE</h1>
            </div>
            <img src="img/gerente.jpg" style="width: 100px; height: 100px;">
            <a class="buton" href="login.php?user_type=gerente">INGRESAR</a>
        </form>
    </div>
    <div class="login-box2">
        <form method="get" action="login.php">
            <div class="user-box">
                <h1>ADMINISTRADOR</h1>
            </div>
            <img src="img/secre.jpg" style="width: 100px; height: 100px;">
            <a class="buton" href="login.php?user_type=administrador">INGRESAR</a>
        </form>
    </div>
</body>

</html>