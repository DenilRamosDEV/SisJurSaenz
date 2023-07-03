<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion</title>
    <link rel="stylesheet" href="../css/gestion-expediente.css">
</head>
<body>
    <header>
        <div class="continer-header">
            <img src="../img/logo-Saenz.jpeg" alt="">
            <h1>ESTUDIO JURIDICO SAENZ</h1>
            <?php
                    if (isset($_GET['user'])) {
                        $user = $_GET['user'];
                    }
                ?>
            <ul>
                <li><?php echo "Administrador: ".ucfirst($user);?></li>
                <li><a href="../menuAdministrador.php?usuario=<?php echo $user?>">Salir al menu</a></li>
            </ul>
        </div>
    </header>
        

    <footer>
        <div class="copyright">
            <p>&copy Copyright 2023</p>
        </div>
    </footer>



</body>
</html>