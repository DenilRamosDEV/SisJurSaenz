<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/gestionarReportes.css" rel="stylesheet">
    <title>Gestion de Reportes</title>

    <!-- google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <header>
        <div class="continer-header">
            <img src="../img/logo-Saenz.jpeg" alt="">
            <h1>ESTUDIO JURIDICO SAENZ</h1>
            <ul>
                <li><?php echo "Gerente: Hugo" ?></li>
                <li><a href="../menuGerente.php">salir al menu</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="estadistica">
            <div id="top_x_div" style="width: 750px; height: 550px; margin:20px auto;"></div>
        </div>
        <div class="container_table">
            <div class="container_uno">
                <div class="caso-cabecera">
                    <h3>CASOS PENALES</h3>
                    <form action="" method="post">
                        <label for="campo">Buscar</label>
                        <input type="text" name="campo" id="campo">
                    </form>
                </div>
                <table class="rwd-table">
                    <thead>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th></th>
                    </thead>
                    <tbody id="content"></tbody>
                </table>
            </div>
            <div class="container_dos">
                <div class="caso-cabecera">
                    <h3>CASOS CIVILES</h3>
                    <form action="" method=" post">
                        <label for="campo2">Buscar</label>
                        <input type="text" name="campo2" id="campo2">
                    </form>
                </div>
                <table class="rwd-table">
                    <thead>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th></th>
                    </thead>
                    <tbody id="content2"></tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <div class="copyright">
            <p>&copy Copyright 2023</p>
        </div>
    </footer>

    <script type="text/javascript" src="../javascript/gestionarReporte.js"></script>
</body>

</html>