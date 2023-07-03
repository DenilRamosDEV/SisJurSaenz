<?php
class conexionn{
    public $conexion = null;
    public function conectar(){
        $conexion = new mysqli('localhost','root','','sisjursaenz');
        if($conexion->connect_error){
            die("conexion fallida: ".$conexion->connect_error);
            echo "conexion fallida";
        }
        //echo"conexion exitosa <br>";
        return $conexion;
        
    }
}

/*
// Crear una instancia de la clase "conexionn"
$objConexion = new conexionn();
$conexion = $objConexion->conectar();
*/

?>