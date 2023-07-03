<?php

    if (!empty($_POST["agregaruser"])) {
        $usuario = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $contra = $_POST["contrasena"];
        $tipousuario = $_POST["tipo-usuario"];
        
        include "../model/gerente/crudusuario.php";
        $obj= new gestionusuario();
        $ejecutar = $obj->agregaruser($usuario, $apellido, $contra, $tipousuario);
        /*
        //include "../model/conexion.php";

        //consulta 
        $objConexion = new conexionn();
        $conexion = $objConexion->conectar();           
        $sql="CALL InsertarUsuario('$usuario', '$apellido', '$contra', '$tipousuario')";
        $resultado = $conexion->query($sql);

        if ($resultado === false) {
            echo "Error en la consulta: ".$conexion->error;
            //header("location: ../view/funciones_gerente/gestionUsuario.php");
        }
        else{
            echo "EXITO en la consulta:";
            header("location: ../view/funciones_gerente/gestionUsuario.php");
        }
        $conexion->close();
        */
    }

?>