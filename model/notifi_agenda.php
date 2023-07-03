<?php
    include "../model/conexion.php";

  class  proximamodel{
    public function sacar_proxaudi(){

        $nombre_cliente = null;
        $fechaaudi = null;

        $objConexion = new conexionn();
        $conexion = $objConexion->conectar();
        $sqlproxaudi = "SELECT id_expediente, fecha_audiencia 
        FROM audiencia 
        WHERE fecha_audiencia BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY) 
        ORDER BY ABS(TIMESTAMPDIFF(SECOND, CURDATE(), fecha_audiencia))
        LIMIT 1";
        $resultaudi = $conexion->query($sqlproxaudi);

        if ($resultaudi === false) {
            echo "Error al extraer la fecha de la base de datos";
        } else {
            
            if ($resultaudi->num_rows > 0) {
                $row = $resultaudi->fetch_assoc();
                $fechaaudi = $row['fecha_audiencia'];
                $id_expediente = $row['id_expediente'];
                $sqlidclient= "SELECT id_cliente FROM expediente WHERE id_expediente=$id_expediente";
                $resulidclient = $conexion->query($sqlidclient);
                if($resulidclient===false){
                    echo "Error al extraer id cliente, del expediente";
                }
                else{
                    if($resulidclient ->num_rows>0){
                        $row=$resulidclient->fetch_assoc();
                        $id_clienteaud = $row['id_cliente'];
                        $sqlnomclientaud="SELECT nombre_completo FROM cliente WHERE id_cliente =$id_clienteaud";
                        $resultnomclient= $conexion->query($sqlnomclientaud);
                        if($resultnomclient === false){
                            echo "Error al extraer nombre del cliente";
                        }
                        
                        else{
                            if($resultnomclient->num_rows>0){
                                $row = $resultnomclient-> fetch_assoc();
                                $nombre_cliente = $row['nombre_completo'];
                                return array($nombre_cliente,$fechaaudi);
                                $conexion->close();
                            }
                            else{
                               
                                $conexion->close();
                                return array($nombre_cliente,$fechaaudi);
                            }
                        }
                    }
                    else{
                        
                        $conexion->close();
                        return array($nombre_cliente,$fechaaudi);
                    }

                }
                
            } else {
                
                $conexion->close();
                return array($nombre_cliente,$fechaaudi);
            }
        }
        $conexion->close();
    }
    
    public function sacar_proxcita(){
        
        $fechacita = null;
        $nomclientecita= null;

        $objConexion = new conexionn();
        $conexion = $objConexion->conectar();
        $sqlproxcita = "SELECT id_cliente, fecha_cita 
        FROM cita 
        WHERE fecha_cita BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY) 
        ORDER BY ABS(TIMESTAMPDIFF(SECOND, CURDATE(), fecha_cita))
        LIMIT 1";
        $resultcita = $conexion->query($sqlproxcita);

        if ($resultcita === false) {
            echo "Error al extraer la fecha de la base de datos";
        } else {
            if ($resultcita->num_rows > 0) {
                $row = $resultcita->fetch_assoc();
                $fechacita = $row['fecha_cita'];
                $id_cliente = $row['id_cliente'];
                $sqlnomcliente="SELECT nombre_completo FROM cliente WHERE $id_cliente";
                $resulnomcliente= $conexion->query($sqlnomcliente);
                if($resulnomcliente=== false){
                    echo "Error al nombre del cliente";
                }
                else{
                    if($resulnomcliente->num_rows>0){
                    $row = $resulnomcliente->fetch_assoc();
                    $nomclientecita= $row['nombre_completo'];
                    $conexion->close();
                    return array($nomclientecita,$fechacita);
                    }
                    else{
                        //$fechacita = "--/--/-- --.--.--";
                        //$nomclientecita= "--- ---- ---";
                        $conexion->close();
                        return array($nomclientecita,$fechacita);
                    }
                }
                
            } else {
                //$fechacita = "--/--/-- --.--.--";
                //$nomclientecita= "--- ---- ---";
                $conexion->close();
                return array($nomclientecita,$fechacita);
            }
        }
        $conexion->close();
    }

    public function sacar_proxconsul(){

        $nombreconsul= null;
        $fechaconsul = null;

        $objConexion = new conexionn();
        $conexion = $objConexion->conectar();
        $sqlproxconsul = "SELECT nombre_completo, fecha_consulta 
        FROM consulta 
        WHERE fecha_consulta BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY) 
        ORDER BY ABS(TIMESTAMPDIFF(SECOND, CURDATE(), fecha_consulta))
        LIMIT 1";
        $resultconsul = $conexion->query($sqlproxconsul);

        if ($resultconsul === false) {
            echo "Error al extraer la fecha de la base de datos";
        } else {
            
            if ($resultconsul->num_rows > 0) {
                $row = $resultconsul->fetch_assoc();
                $nombreconsul= $row['nombre_completo'];
                $fechaconsul = $row['fecha_consulta'];
                $conexion->close();
                return array($nombreconsul, $fechaconsul);
            } else {
                
                $conexion->close();
                return array($nombreconsul, $fechaconsul);
            }
        }
        $conexion->close();
    }
  }
?>