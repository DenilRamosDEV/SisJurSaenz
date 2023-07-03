<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion</title>
    <link rel="stylesheet" href="../css/gestion_cliente.css">
</head>
<body>
    <header>
        <div class="continer-header">
            <img src="../img/logo-Saenz.jpeg" alt="">
            <h1>ESTUDIO JURIDICO SAENZ</h1>
            <?php
                //$user = isset($_POST['user_name']) ? $_POST['user_name'] : '';
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
    <main>
        <div class="caja-todo">
            <div class="container-buscar">
                <form  id="form-busqueda" action="../../controller/buscar_cliente.php" method="POST">
                    <input type="hidden" name="user_name" value="<?php echo $user; ?>">
                    <label for="">Ingresar DNI para buscar al cliente</label>
                    <input type="number" name="dnibusqueda" id="dnibusqueda" required>
                    <input type="submit" value="Buscar" name="buscarclient">
                </form>
                <?php
                    $tabla= null;
                // if (!empty($_POST["buscar"])) {
                    //include "../../controller/buscar_cliente.php";
                    if (isset($_GET['tabla'])) {
                        $tabla = $_GET['tabla'];
                        echo $tabla;
                    }
                    $user = isset($_POST['user_name']) ? $_POST['user_name'] : '';
                    $editelim = null;                    
                    if(isset($_GET['editareliminar'])){
                        $editelim = $_GET['editareliminar'];
                        echo $editelim;
                    }
                    
            // }
                ?>            
               <div class='opcciones-cliente'>
                    <div class="div-edit">
                        <form  name='editar-cliente' class='opcion-editar'>
                            <h4>Editar</h4>
                            <label >Nombre Apellidos</label>
                            <input type='text' name='nom-client' id='nom-client' required>

                            <label>DNI</label>
                            <input type='number' name='dni-client' id='dni-client' required>

                            <label>Genero</label>
                            <select id='opcion-genero' name='opcion-genero'>
                                <option value='' disabled selected hidden>Seleccionar</option>
                                <option value='M'>Masculino</option>
                                <option value='F'>Femenino</option>
                            </select>

                            <label>Telefono</label>
                            <input type='number' name='cel-client' id='cel-client' required>

                            <label>Direccion</label>
                            <input type='text' name='direc-client' id='direc-client' required>

                            <label>Email</label>
                            <input type='email' name='email-client' id='email-client' required>
                            <input type='submit' value='editar' name='editar-client'>
                        </form>
                    </div>

                    <div class="div-elim">
                        <form name='eliminar-client' class='eliminar-client'>
                            <h4>Eliminar</h4>
                            <label>ID</label>
                            <input type='number' name='id-eliminar' required>
                            <input type='submit' value='eliminar' name='btn-eliminar-client'>
                        </form>
                    </div>
                </div> 
            </div>
                    
            <div class="container-registrar">
                <form  id="form-agregar-client" action="../../controller/buscar_cliente.php" method="POST">
                    <h3>AGREGAR CLIENTE</h3>
                    <!-- <input type="hidden" name="user_name" value="<?php //echo $user; ?>"> -->
                    <label for="">Nombre Apellidos</label>
                    <input type="text" name="nom-client" id="nom-client" required>

                    <label for="">DNI</label>
                    <input type="number" name="dni-client" id="dni-client" required>

                    <label for="">Genero</label>
                    <select id="opcion-genero" name="opcion-genero">
                        <option value="" disabled selected hidden>Seleccionar</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>

                    <label for="">Telefono</label>
                    <input type="number" name="cel-client" id="cel-client" required>

                    <label for="">Direccion</label>
                    <input type="text" name="direc-client" id="direc-client" required>

                    <label for="">Email</label>
                    <input type="email" name="email-client" id="email-client" required>
                    
                    <input type="submit" value="Agregar" name="agregar">
                </form>                    
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