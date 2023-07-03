<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=google">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/gestionUsuario.css" rel="stylesheet">
    <title>Document</title>
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
        <h2 class="titulo">LISTA DE USUARIOS ACTIVOS</h2>
        <div class="continer-main">
            <?php
            require_once "../../model/conexion.php";
            $objConexion = new conexionn();
            $conexion = $objConexion->conectar();           
            
            $sql = "SELECT id_usuario, nombre, apellido, tipo_usuario FROM usuario ";
            $resultado = $conexion->query($sql);
            
            if ($resultado === false) {
                echo "Error en la consulta: ".$conexion->error;
            } else {
                if (mysqli_num_rows($resultado) > 0) {
                    echo "<table class='tablausuario'>";
                    echo "<tr>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tipo Usuario</th>
                    </tr>";
            
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id_usuario']."</td>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['apellido']."</td>";
                        echo "<td>".ucfirst($row['tipo_usuario'])."</td>";
                        echo "</tr>";
                    }
            
                    echo "</table>";
                } else {
                    echo "No se encontraron resultados.";
                }
            }
            $conexion->close();
            ?>
  
        </div>
        <div class="primer">

        <div class="agregar">
            <form method="POST" class="formulario" action="../../controller/agregarusuario.php">
                <h3>Agregar nuevo usuario</h3><br>
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="campo">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
                <div class="campo">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>
                <div class="campo">
                    <label for="tipo-usuario">Tipo de Usuario:</label>
                    <input type="text" id="tipo-usuario" name="tipo-usuario" value="administrador" readonly>
                </div>
                <div class="campo">
                    <input type="submit" value="Agregar Usuario" name="agregaruser">
                </div>
            </form>
        </div>
        
        <div class="edit">
            <form method="POST" class="editarusuario" action="../../controller/editarusuario.php">
                <h3>Editar Usuario</h3>
                <br>
                
                <label for="id_usuario">ID de Usuario:</label>
                <input type="text" id="id_usuario" name="id_usuario">
                
                <label for="nombre_columna">Nombre / Apellido</label>
                <select id="opcion" name="opcion">
                    <option value="nombre">Nombre</option>
                    <option value="apellido">Apellido</option>
                </select>
                
                <label for="nuevo_valor">Nuevo Valor:</label>
                <input type="text" id="nuevo_valor" name="nuevo_valor">
                
                <input type="submit" value="Editar" name="editaruser">
            </form>           
        </div>

        <div class="eliminar">
            <form id="deleteForm" action="../../controller/eliminarusuario.php" method="POST">
                <h3>Eliminar Usuario</h3>
                <label for="userId">ID del Usuario:</label>
                <input type="text" id="userId" name="userId" required>
                <input type="submit" value="Eliminar" name="eliminarbt">
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