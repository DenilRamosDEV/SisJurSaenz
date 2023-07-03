<?php

include "../model/conexion.php";
class gestion_cliente{
    
    public function vercliente($dnicliente){
        $objConexion = new conexionn();
        $conexion = $objConexion->conectar();

        $sqlvercliente="SELECT * FROM cliente WHERE dni_cliente = $dnicliente ";
        $resuverclient= $conexion->query($sqlvercliente);
        if($resuverclient=== false){
            echo "ERROR EN OBTENER EL CLIENTE";
        }
        else{
            $id_cliente = null;
            $nombre_completo = null;	
            $dni_cliente = null;	
            $genero = null;	
            $telefono = null;	
            $direccion = null;
            $fecha_registro = null;
            $email = null;
            if (mysqli_num_rows($resuverclient) > 0) {
                $row = $resuverclient->fetch_assoc();

                $id_cliente= $row['id_cliente'];
                $nombre_completo= $row['nombre_completo'];	
                $dni_cliente= $row['dni_cliente'];	
                $genero= $row['genero'];	
                $telefono= $row['telefono'];	
                $direccion= $row['direccion'];
                $fecha_registro= $row['fecha_registro'];
                $email= $row['email'];	
                return array($id_cliente, $nombre_completo,	
                $dni_cliente, $genero,
                $telefono, $direccion, $fecha_registro,$email );
            }
            return array($id_cliente, $nombre_completo,	
            $dni_cliente, $genero,
            $telefono, $direccion, $fecha_registro,$email );
            $conexion->close();
        }
    }
    public function eliminarcliente(){
        
    }
    public function editarcliente(){
        
    }
    public function agregarcliente(){
        
    }

}
?>