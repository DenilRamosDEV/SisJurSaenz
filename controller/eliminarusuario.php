<?php

    if (!empty($_POST["eliminarbt"])) {
        $id_user = $_POST["userId"];;
        echo"llega2";
        //include "../model/conexion.php";
        include "../model/gerente/crudusuario.php";
        $obj= new gestionusuario();
        $ejecutar = $obj->eliminbaruser($id_user);
        //consulta 
        /*
        $objConexion = new conexionn();
        $conexion = $objConexion->conectar();           
        $sql="CALL EliminarUsuario($id_user)";
        $resultado = $conexion->query($sql);

        if ($resultado === false) {
            echo "Error en la consulta: ".$conexion->error;
        }
        else{
            echo "EXITO eliminar";
            header("location: ../view/funciones_gerente/gestionUsuario.php");
        }

        $conexion->close();
        */
    }
?>