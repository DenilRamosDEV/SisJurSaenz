<?php
if (isset($_GET['id'])) {
    $idExpediente=$_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Reporte</title>
    <!-- Styles -->
    <link rel="stylesheet" href="../../css/gestionarReportes.css">
</head>

<body>
<header>
        <div class="continer-header">
            <img src="../../img/logo-Saenz.jpeg" alt="">
            <h1>ESTUDIO JURIDICO SAENZ</h1>
            <ul>
                <li><?php echo "Gerente: Hugo" ?></li>
                <li><a href="../../menuGerente.php">salir al menu</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container_report">
            <div class="resumen componentes">
                <h2>Resumen</h2>
                <div class="detalles" id="resumen">
                </div>
            </div>
            <div class="actividades componentes detalles_2">
                <h2>Actividades</h2>
                <div class="detalles" id="actividad">
                </div>
            </div>
            <div class="precios componentes detalles_2">
                <h2>Precios</h2>
                <div class="detalles" id="precio">
                </div>
            </div>
        </div>
        <div class="descargar">
            <a href="./downloadReport.php?id=<?php echo $idExpediente ?>" target="_blank">Generar PDF</a>
        </div>
    </main>
    <footer>
        <div class="copyright">
            <p>&copy Copyright 2023</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        generateReport();
        function generateReport() {
            let resumen = document.getElementById("resumen");
            let actividad = document.getElementById("actividad");
            let precio = document.getElementById("precio");
            let url = "../../../controller/generateReportController.php";
            let formatoEnvio = new FormData();
            formatoEnvio.append('idExpediente', '<?php echo $idExpediente; ?>');
            fetch(url, {
                    method: "POST",
                    body: formatoEnvio
                })
                .then(response => response.json())
                .then(data => {
                    let campo1 = data.campo1;
                    let campo2 = data.campo2;
                    let campo3 = data.campo3;
                    resumen.innerHTML = campo1;
                    actividad.innerHTML = campo2;
                    precio.innerHTML = campo3;
                }).catch(err => console.log(err))
        }
    </script>
</body>

</html>