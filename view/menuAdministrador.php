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
            <ul>
                <li><?php echo "Administrador:Nicolay" ?></li>
                <li><a href="./usereleccion.php">Cerrar Seccion</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="continer-main">
            <div class="continer-notificacion">
                <div class="notificacion">
                    <img src="./img/notificscion.png" alt="">
                    <p>
                        Proxima cita y audiencias
                    </p>
                </div>
                <div class="notificacion">
                    <img src="./img/calendar.jpg" alt="">
                    <p>
                        Calendario
                    </p>
                </div>    
            </div>
            <div class="continer-caja">
                <div class="caja">
                    <p>Gestionar Agendas</p>
                    <img src="./img/agend-icon.png" alt="">
                </div>
                <div class="caja">
                    <p>Gestionar Cantidad de Caso</p>
                    <img src="./img/case-icon.png" alt="">
                </div>
                <div class="caja">
                    <p>Gestionar Precios</p>
                    <img src="./img/prescios-icon.png" alt="">
                </div>
                <div class="caja">
                    <p>Gestionar Expedientes</p>
                    <img src="./img/expedints-icon.png" alt="">
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