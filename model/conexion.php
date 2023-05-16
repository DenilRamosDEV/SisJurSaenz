<?php
$mbd = null;
$servidor = "localhost";
$usuario = "root";
$clave = "";
$puerto="3308";
try {
    $mbd = new PDO("mysql:host=localhost;port=$puerto;dbname=sisjursaenz", $usuario, $clave);
    echo 'conexion exitosa';
} catch (PDOException $e) {
    echo "ERROR AL CONECTAR ";
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
return $mbd;
