<?php
if (isset($_GET['id'])) {
    $idExpediente = $_GET['id'];
}
require '../../../model/conexion.php';
require('./Fpdf/fpdf.php');

// consultas a la base de datos
$objConexion = new conexionn();
$conexion = $objConexion->conectar();
$sql1 = $conexion->query("SELECT * FROM expediente JOIN cliente ON expediente.id_cliente = cliente.id_cliente WHERE expediente.id_expediente =" . $idExpediente);
$num_row1 = $sql1->num_rows;
if ($num_row1 > 0) {
    $row = $sql1->fetch_assoc();
    $numExpediente = $row['id_expediente'];
    $nombreCliente = $row['nombre_completo'];
    $dniCliente = $row['dni_cliente'];
    $fechaRegistro = $row['fecha_registro'];
    $estadoExpediente = $row['estado_expediente'];
    $tipoExpediente = $row['tipo_expediente'];
}

$sql2_1 = $conexion->query("SELECT cita.fecha_cita,usuario.nombre,cita.decripcion FROM cliente INNER JOIN cita ON cliente.id_cliente = cita.id_cliente INNER JOIN expediente ON cliente.id_cliente = expediente.id_cliente INNER JOIN usuario ON expediente.id_cliente = usuario.id_usuario WHERE expediente.id_expediente =" . $idExpediente);
$sql2_2 = $conexion->query("SELECT audiencia.fecha_audiencia FROM cliente INNER JOIN expediente ON cliente.id_cliente = expediente.id_cliente INNER JOIN audiencia ON expediente.id_expediente = audiencia.id_expediente WHERE expediente.id_expediente =" . $idExpediente);
$cont = 1;
$cont2 = 1;
$precioTotal=0;
$table1 = "Cita";
$table2 = "Audiencia";
$num_row2_1 = $sql2_1->num_rows;
$num_row2_2 = $sql2_2->num_rows;


$sql3 = $conexion->query("SELECT audiencia.id_audiencia, audiencia.fecha_audiencia, audiencia.precio FROM cliente INNER JOIN expediente ON cliente.id_cliente = expediente.id_cliente INNER JOIN audiencia ON expediente.id_expediente = audiencia.id_expediente WHERE expediente.id_expediente =" . $idExpediente);
$num_row3 = $sql3->num_rows;



//imprimir pdf
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../../img/logo-Saenz.jpeg', 15, 4, 24);
        $this->Image('../../img/csdjdh.png', 170, 0, 35);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(75);
        // Título
        $this->Cell(55, 16, 'Estudio Juridico Saenz', 0, 0, 'C');
        // Salto de línea
        $this->Ln(28);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Creación del objeto de la clase heredada
$num = 1;
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 10, 'DATOS GENERALES', 0, 1);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(0, 10, 'Numero de Caso                 :            0' . $numExpediente, 0, 1);
$pdf->Cell(0, 10, 'Cliente                                 :            ' . $nombreCliente, 0, 1);
$pdf->Cell(0, 10, 'DNI                                     :            ' . $dniCliente, 0, 1);
$pdf->Cell(0, 10, 'Fecha de Registro                :            ' . $fechaRegistro, 0, 1);
$pdf->Cell(0, 10, 'Estado del Caso                   :            ' . $estadoExpediente, 0, 1);
$pdf->Cell(0, 10, 'Tipo de Caso                       :            ' . $tipoExpediente, 0, 1);
$pdf->Ln(10);

// calendario de actividades
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 10, 'REGISTRO DE ACTIVIDADES', 0, 1);

$pdf->Cell(10, 10, '#', 1, 0, 'C', 0);
$pdf->Cell(35, 10, 'Tipo de Actividad', 1, 0, 'C', 0);
$pdf->Cell(40, 10, 'Fecha', 1, 0, 'C', 0);
$pdf->Cell(105, 10, 'Descripcion', 1, 1, 'C', 0);
$pdf->SetFont('Times', '', 12);
if ($num_row2_1 > 0 || $num_row2_2 > 0) {
    while ($row = $sql2_1->fetch_assoc()) {
        $pdf->Cell(10, 10, $cont, 1, 0, 'C', 0);
        $pdf->Cell(35, 10, $table1, 1, 0, 'C', 0);
        $pdf->Cell(40, 10, $row['fecha_cita'], 1, 0, 'C', 0);
        $pdf->Cell(105, 10, $row['decripcion'], 1,1, 'C', 0);
        $cont++;
    }
    while ($row = $sql2_2->fetch_assoc()) {
        $pdf->Cell(10, 10, $cont, 1, 0, 'C', 0);
        $pdf->Cell(35, 10, $table2, 1, 0, 'C', 0);
        $pdf->Cell(40, 10, $row['fecha_audiencia'], 1, 0, 'C', 0);
        $pdf->Cell(105, 10, 'no data', 1, 1, 'C', 0);
        $cont++;
    }
}else{
    $pdf->Cell(190, 10, 'No Existen Registros', 1, 1, 'C', 0);
}
$pdf->Ln(10);

// reporte de precios
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 10, 'PRECIOS POR ACTIVIDAD', 0, 1);
$pdf->Cell(60, 10, 'Numero de Audiencia', 1, 0, 'C', 0);
$pdf->Cell(85, 10, 'Fecha de Audiencia', 1, 0, 'C', 0);
$pdf->Cell(45, 10, 'Precio de Audiencia', 1, 1, 'C', 0);
$pdf->SetFont('Times', '', 12);
if ($num_row3 > 0) {
    while ($row = $sql3->fetch_assoc()) {
        $pdf->Cell(60, 10, $cont2, 1, 0, 'C', 0);
        $pdf->Cell(85, 10, $row['fecha_audiencia'], 1, 0, 'C', 0);
        $pdf->Cell(45, 10, 's/.'.$row['precio'], 1, 1, 'C', 0);
        $cont++;
        $precioTotal+=$row['precio'];
    }
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(145, 10, 'Total', 1, 0, 'C', 0);
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(45, 10, 's/.'.$precioTotal, 1, 1, 'C', 0);
}else{
    $pdf->Cell(190, 10, 'No Existen Registros', 1, 1, 'C', 0);
}

$pdf->Output();
