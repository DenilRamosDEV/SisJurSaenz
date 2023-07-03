<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Gerente</title>

    <link rel="stylesheet" href="./css/menu.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
</head>

<body>
    <header>
        <div class="continer-header">
            <img src="./img/logo-Saenz.jpeg" alt="">
            <h1>ESTUDIO JURIDICO SAENZ</h1>
            <ul>
                <?php
                    if (isset($_GET['usuario'])) {
                        $user = $_GET['usuario'];
                    }
                ?>
                <li><?php echo "Gerente: ".ucfirst($user); ?></li>
                <li><a href="./usereleccion.php">Cerrar Seccion</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="continer-main">
            <div class="continer-notificacion">
                
                <div class="notificacion">
                    <h4>Sus proximas actividades</h4>
                    <?php
                        include "../controller/notifi_agenda.php";
                        $objnoti = new notifi_agenda();
                    ?>
                    <br>
                    
    
                </div>
                <a href="#"> 
                    <div class="notificacion cta">
                    <img src="./img/calendar.jpg" alt="">
                        <p>
                        Calendario
                        </p>
                    </div> 
                </a>   
            </div>
            <div class="continer-caja">
                <a href="./funciones_gerente/gestionUsuario.php">
                    <div class="caja">
                        <p>Gestionar Usuario</p>
                        <img src="./img/user-icon.png" alt="">
                    </div>
                </a>
                <a href="./funciones_gerente/gestionarReportes.php">
                <div class="caja">
                    <p>Gestionar Reportes</p>
                    <img src="./img/report-icon.png" alt="">
                </div>
                </a>
                <div class="caja">
                    <p>Gestionar Expedientes</p>
                    <img src="./img/expedints-icon.png" alt="">
                </div>
            </div>
        </div>
        <!-- calendar -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: "es",
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    dateClick: function(info) {
                        alert('Date: ' + info.dateStr);
                        alert('Resource ID: ' + info.resource.id);
                    }
                });
                calendar.render();
            });
        </script>
        <div class="modal-container">
            <div class="container modal-close">
                <p class="cerrar">X</p>
                <div class="col-md-8 offset-md-2">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="copyright">
            <p>&copy Copyright 2023</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="./javascript/menuGerente.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>