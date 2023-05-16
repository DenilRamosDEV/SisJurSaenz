<?php

if (!empty($_POST["ingreso"])) {
    $usuario = $_POST["user"];
    $contra = $_POST["clave"];
    $tipousuario = $_POST["user_type"];
    echo "valor 1" . $usuario;
    echo "valor 2" . $contra;
    echo "valor 3" . $tipousuario;

    $stmt = $mbd->prepare("SELECT * FROM usuario WHERE nombre = :usuario AND contrasena = :contra AND tipo_usuario = :tipousuario");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contra', $contra);
    $stmt->bindParam('tipousuario', $tipousuario);
    // Ejecutar la consulta
    $stmt->execute();
    // Obtener el número de filas
    $num = $stmt->rowCount();
    if ($num > 0) {
        // Iniciar sesión
        // session_start();        
        // header("Location: ../view/inicioGerente.php");
        if ($tipousuario == "gerente") {
            session_start();
            header("Location: ../view/menuGerente.php");

        } else if ($tipousuario == "administrador") {
            // Redirigir al usuario a la página de inicio
            session_start();
            header("Location: ../view/menuAdministrador.php");
        }
        
    } else {
        echo "<scrpt>console.log('error de inicion de seccion');</scrpt>";
        //devolver al loging
        header("location: ../view/usereleccion.php");
    }
}