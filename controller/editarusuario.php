<?php

    if (!empty($_POST["editaruser"])) {
        $idUser = $_POST["id_usuario"];
        $nameColumn = $_POST["opcion"];
        $newValor = $_POST["nuevo_valor"];
        include "../model/gerente/crudusuario.php";
        $obj= new gestionusuario();
        $ejecutar = $obj->editaruser($idUser, $nameColumn,$newValor);
        /*
        //include "../model/conexion.php";
        
        //consulta 
        $objConexion = new conexionn();
        $conexion = $objConexion->conectar();
        if($nameColumn=="nombre") {     
            $sql="CALL EditarTablaN($idUser, '$newValor')";
            $resultado = $conexion->query($sql);

            if ($resultado === false) {
                echo "Error en la consulta: ".$conexion->error;
                
            }
            else{
                echo "EXITO en la consulta:";
                header("location: ../view/funciones_gerente/gestionUsuario.php");
            }
        }
        else{
            $sql="CALL EditarTablaA($idUser, '$newValor')";
            $resultado = $conexion->query($sql);

            if ($resultado === false) {
                echo "Error en la consulta: ".$conexion->error;
                
            }
            else{
                echo "EXITO en la consulta:";
                header("location: ../view/funciones_gerente/gestionUsuario.php");
            }
        }
        $conexion->close();
        */
    }
?>