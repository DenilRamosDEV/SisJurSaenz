<?php
include "../model/gerente/gestionarReporteModel.php";

$campo = $_POST['campo'];
$campo2 = $_POST['campo2'];

$modelo = new Modelo();
$response = $modelo->obtenerDatos($campo, $campo2);

echo json_encode($response);
?>
