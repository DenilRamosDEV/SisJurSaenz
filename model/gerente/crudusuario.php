<?php
include "../model/conexion.php";
    class gestionusuario{

        public function agregaruser($usuario, $apellido, $contra, $tipousuario){
            
            $objConexion = new conexionn();
            $conexion = $objConexion->conectar(); 
            $sql="CALL InsertarUsuario('$usuario', '$apellido', '$contra', '$tipousuario')";
            $resultado = $conexion->query($sql);

            if ($resultado === false) {
                echo "Error en la consulta: ".$conexion->error;
                
            }
            else{
                //echo "EXITO en la consulta:";
                header("location: ../view/funciones_gerente/gestionUsuario.php");
            }
            $conexion->close();
        }

        public function editaruser($idUser, $nameColumn,$newValor){

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

        }
        public function eliminbaruser($id_user){
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
        }
    }
?>