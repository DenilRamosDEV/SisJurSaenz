<?php
include "../model/conexion.php";

class Modelo
{
    private $conexion;

    public function __construct()
    {
        $objConexion = new conexionn();
        $this->conexion = $objConexion->conectar();
    }

    public function obtenerDatos($campo, $campo2)
    {
        $where1 = "";
        if ($campo != null) {
            $where1 = " AND nombre_completo LIKE '%" . $campo . "%'";
        }

        $where2 = "";
        if ($campo2 != null) {
            $where2 = " AND nombre_completo LIKE '%" . $campo2 . "%'";
        }

        $sql1 = $this->conexion->query("SELECT * FROM expediente JOIN cliente ON expediente.id_cliente = cliente.id_cliente WHERE expediente.tipo_expediente = 'penal'" . $where1);
        $num_row1 = $sql1->num_rows;
        $html1 = '';
        if ($num_row1 > 0) {
            while ($row = $sql1->fetch_assoc()) {
                $html1 .= '<tr>';
                $html1 .= '<td style="text-align: center;">' . $row['id_expediente'] . '</td>';
                $html1 .= '<td>' . $row['nombre_completo'] . '</td>';
                $html1 .= '<td style="text-align: center;">' . $row['estado_expediente'] . '</td>';
                $html1 .= '<td style="text-align: center;"><a href="GestionarReportes/generateReport.php?id=' . $row['id_expediente'] . '">ver mas</a></td>';
                $html1 .= '</tr>';
            }
        } else {
            $html1 .= '<tr>';
            $html1 .= '<td colspan="7">Sin Resultados</td>';
            $html1 .= '</tr>';
        }

        $sql2 = $this->conexion->query("SELECT * FROM expediente JOIN cliente ON expediente.id_cliente = cliente.id_cliente WHERE expediente.tipo_expediente='civil'" . $where2);
        $num_row2 = $sql2->num_rows;
        $html2 = '';
        if ($num_row2 > 0) {
            while ($row = $sql2->fetch_assoc()) {
                $html2 .= '<tr>';
                $html2 .= '<td style="text-align: center;">' . $row['id_expediente'] . '</a></td>';
                $html2 .= '<td>' . $row['nombre_completo'] . '</td>';
                $html2 .= '<td style="text-align: center;">' . $row['estado_expediente'] . '</td>';
                $html2 .= '<td style="text-align: center;"><a href="GestionarReportes/generateReport.php?id=' . $row['id_expediente'] . '">ver mas</a></td>';
                $html2 .= '</tr>';
            }
        } else {
            $html2 .= '<tr>';
            $html2 .= '<td colspan="7">Sin Resultados</td>';
            $html2 .= '</tr>';
        }

        $response = array(
            'data1' => $html1,
            'data2' => $html2,
            'data3' => $num_row1,
            'data4' => $num_row2
        );

        return $response;
    }

    public function generateReport($idExpediente)
    {

        $sql1 = $this->conexion->query("SELECT * FROM expediente JOIN cliente ON expediente.id_cliente = cliente.id_cliente WHERE expediente.id_expediente =" . $idExpediente);
        $num_row1 = $sql1->num_rows;
        $html1 = '';
        if ($num_row1 > 0) {
            while ($row = $sql1->fetch_assoc()) {
                $html1 .= '<p> <strong style="color: #a3a342;"> Numero de Caso: </strong>' . $row['id_expediente'] . '</p>';
                $html1 .= '<p> <strong style="color: #a3a342;">Cliente:</strong>' . $row['nombre_completo'] . '</p>';
                $html1 .= '<p> <strong style="color: #a3a342;">DNI:</strong>' . $row['dni_cliente'] . '</p>';
                $html1 .= '<p> <strong style="color: #a3a342;">Fecha de Inicio:</strong>' . $row['fecha_registro'] . '</p>';
                $html1 .= '<p> <strong style="color: #a3a342;">Estado del Caso:</strong>' . $row['estado_expediente'] . '</p>';
                $html1 .= '<p> <strong style="color: #a3a342;">Tipo de Caso:</strong>' . $row['tipo_expediente'] . '</p>';
            }
        } else {
            $html1 .= '<p> <strong style="color: #fff;">SIN DATOS</strong></p>';
        }

        $sql21 = $this->conexion->query("SELECT cita.fecha_cita FROM cliente INNER JOIN cita ON cliente.id_cliente = cita.id_cliente INNER JOIN expediente ON cliente.id_cliente = expediente.id_cliente WHERE expediente.id_expediente =" . $idExpediente);
        $sql22 = $this->conexion->query("SELECT audiencia.fecha_audiencia FROM cliente INNER JOIN expediente ON cliente.id_cliente = expediente.id_cliente INNER JOIN audiencia ON expediente.id_expediente = audiencia.id_expediente WHERE expediente.id_expediente =" . $idExpediente);
        $table1 = "Cita";
        $table2 = "Audiencia";
        $num_row21 = $sql21->num_rows;
        $num_row22 = $sql22->num_rows;
        $html2 = '';
        if ($num_row21 > 0 || $num_row22 > 0) {
            $cont = 1;
            while ($row = $sql21->fetch_assoc()) {
                $html2 .= '<div class="actividades carts">';
                $html2 .= '<h3>Actividad 0' . $cont . '</h3>';
                $html2 .= '<div class="actividad">';
                $html2 .= '<p> <strong style="color: #a3a342;">Tipo: </strong>' . $table1 . '</p>';
                $html2 .= '<p> <strong style="color: #a3a342;">Fecha: </strong>' . $row['fecha_cita'] . '</p>';
                $html2 .= '</div>';
                $html2 .= '</div>';
                $cont++;
            }
            while ($row = $sql22->fetch_assoc()) {
                $html2 .= '<div class="actividades carts">';
                $html2 .= '<h3>Actividad 0' . $cont . '</h3>';
                $html2 .= '<div class="actividad">';
                $html2 .= '<p> <strong style="color: #a3a342;">Tipo: </strong>' . $table2 . '</p>';
                $html2 .= '<p> <strong style="color: #a3a342;">Fecha: </strong>' . $row['fecha_audiencia'] . '</p>';
                $html2 .= '</div>';
                $html2 .= '</div>';
                $cont++;
            }
        } else {
            $html2 .= '<p> <strong style="color: #fff;">SIN DATOS</strong></p>';
        }

        $sql3 = $this->conexion->query("SELECT audiencia.id_audiencia, audiencia.fecha_audiencia, audiencia.precio FROM cliente INNER JOIN expediente ON cliente.id_cliente = expediente.id_cliente INNER JOIN audiencia ON expediente.id_expediente = audiencia.id_expediente WHERE expediente.id_expediente =" . $idExpediente);
        $num_row3 = $sql3->num_rows;
        $html3 = '';
        if ($num_row3 > 0) {
            $cont = 1;
            while ($row = $sql3->fetch_assoc()) {
                $html3 .= '<div class="audiencia carts">';
                $html3 .= '<h3>Audiencia 0' . $cont . '</h3>';
                $html3 .= '<div class="actividad">';
                $html3 .= '<p> <strong style="color: #a3a342;">id Audincia:</strong> ' . $row['id_audiencia'] . '</p>';
                $html3 .= '<p> <strong style="color: #a3a342;">Fecha:</strong> ' . $row['fecha_audiencia'] . '</p>';
                $html3 .= '<p> <strong style="color: #a3a342;">Costo:</strong> s/.' . $row['precio'] . '</p>';
                $html3 .= '</div>';
                $html3 .= '</div>';
                $cont++;
            }
        } else {
            $html3 .= '<p> <strong style="color: #fff; padding: 10px auto 0 auto;">SIN DATOS</strong></p>';
        }
        $response = array(
            'campo1' => $html1,
            'campo2' => $html2,
            'campo3' => $html3
        );

        return $response;
    }
}
