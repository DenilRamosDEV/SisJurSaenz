<?php
include "../model/gerente/gestionarReporteModel.php";

$idExpediente = $_POST['idExpediente'];

$modelo = new Modelo();
$response = $modelo->generateReport($idExpediente);

echo json_encode($response);
?>