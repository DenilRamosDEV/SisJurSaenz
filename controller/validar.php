<?php
if (!empty($_POST["ingreso"])) {
    $usuario = $_POST["user"];
    $contra = $_POST["clave"];
    $tipousuario = $_POST["user_type"];
    /*echo "valor 1" . $usuario;
    echo "valor 2" . $contra;
    echo "valor 3" . $tipousuario;
    */
    require_once '../model/conexion.php'; // Incluir el archivo de conexión
    
    $objConexion = new conexionn(); // Crear una instancia de la clase "conexionn"
    $conexion = $objConexion->conectar(); // Llamar al método "conectar" para establecer la conexión
    
    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE nombre = ? AND contrasena = ? AND tipo_usuario = ?");
    
    // Vincular parámetros a la consulta
    $stmt->bind_param("sss", $usuario, $contra, $tipousuario);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado de la consulta
    $resultado = $stmt->get_result();
    
    // Obtener el número de filas
    $num = $resultado->num_rows;
    $conexion->close();
    if ($num > 0) {
        // Iniciar sesión
        // session_start();
        
        // Redirigir al usuario según el tipo de usuario
        if ($tipousuario == "gerente") {
            session_start();
            header("Location: ../view/menuGerente.php?usuario=$usuario");
        } else if ($tipousuario == "administrador") {
            session_start();
            header("Location: ../view/menuAdministrador.php?usuario=". urlencode($usuario));
        }
    } else {
        echo "<script>console.log('error de inicio de sesión');</script>";
        // Devolver al login
        header("location: ../view/usereleccion.php");
    }
}
?>