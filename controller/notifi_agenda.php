<?php
    include "../model/notifi_agenda.php";
    class notifi_agenda{
        public $acum = 0;
        public function __construct() {
            $this->prox_audiencia();
            $this->prox_cita();
            $this->prox_consulta();
            $this->aviso();
        }
        public function prox_audiencia(){
            $obj = new proximamodel();
            $valores = $obj->sacar_proxaudi();    
            if (is_array($valores)) {
                $nombreconsulta = $valores[1];
                $fechaconsulta = $valores[0];
            }
            echo "<table id='tabla-noti'>                
            <tr>
                <th></th>
                <th>Fecha / Hora</th>
                <th>Cliente</th>
            </tr>";
            if($nombreconsulta != null){
                $this->acum++;
                echo"               
                    <tr>
                        <td>Audiencia</td>
                        <td>".$nombreconsulta."</td>
                        <td>".$fechaconsulta."</td> 
                    </tr>";
            }

        }

        public function prox_cita(){
            $obj = new proximamodel();
            $valores = $obj->sacar_proxcita();    
            if (is_array($valores)) {
                $nombrecita = $valores[1];
                $fechacita = $valores[0];
                if($nombrecita !=null){
                    $this->acum++;
                    echo "
                        <tr>
                            <td>Cita</td>
                            <td>".$nombrecita."</td>
                            <td>".$fechacita."</td>
                        </tr>";
                }
            }
        }

        public function prox_consulta(){
            $obj = new proximamodel();
            $valores = $obj->sacar_proxconsul();
    
            if (is_array($valores)) {
                $nombreconsul = $valores[0];
                $fechaconsul = $valores[1];
                if($fechaconsul !=null){
                    $this->acum++;
                    echo "<tr>
                            <td>Consulta</td>
                            <td>".$fechaconsul."</td>
                            <td>".$nombreconsul."</td>
                        </tr>";
                }
                echo "</table>";
            }

        }

        public function aviso(){
            if($this->acum == 3){
                echo"<h5> dentro de los 5 ultimos dias</h5>";
            }
            else
            {
                echo"<h5>NO existe ninguna actividad en los proximos 5 dias</h5>";
            }
        }
    }
?>
