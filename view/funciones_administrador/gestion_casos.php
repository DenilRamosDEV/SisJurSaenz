<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion</title>
    <link rel="stylesheet" href="../css/gestion_casos.css">
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
        <div class="continer-caja">
            <a href="./gestion_client.php?user=<?php echo $user?>">
                <div class="caja">
                    <h3>Gestion de Clientes</h3>
                    <img src="../img/client.png" alt="cliente">
                </div>
            </a>
        <a href="./gestion_expedintes.php?user=<?php echo $user?>">
            <div class="caja">
                <h3>Gestion de Expedintes</h3>
                <img src="../img/casos.png" alt="casos">
            </div>  
        </a>
    </div>

    <footer>
        <div class="copyright">
            <p>&copy Copyright 2023</p>
        </div>
    </footer>



</body>
</html>