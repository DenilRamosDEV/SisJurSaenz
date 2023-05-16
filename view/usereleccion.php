<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Gerente</title>

    <link rel="stylesheet" href="./css/menu.css">
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
            <div class="continer-login">
                <div class="login">
                    <form method="get" action="login.php">
                        <div class="user-box">
                            <h1>GERENTE</h1>
                        </div>
                        <img src="./img/gerente-icon.png">
                        <a class="buton" href="login.php?user_type=gerente">INGRESAR</a>
                    </form>
                </div>
                <div class="login">
                    <form method="get" action="login.php">
                        <div class="user-box">
                            <h1>ADMINISTRADOR</h1>
                        </div>
                        <img src="./img/admin-icon.png">
                        <a class="buton" href="login.php?user_type=administrador">INGRESAR</a>
                    </form>
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
