<?php
if (!empty($_POST["buscarclient"])) {
    $objnoti = new buscarclient();
    $objnoti -> buscar();
}
class buscarclient {
    

    public function buscar() {
        $tablaResultados = '';

        //if (!empty($_POST["buscarclient"])) {
            $dnicliente = $_POST["dnibusqueda"];
            $user = $_POST["user_name"];
            $numeros = range(0, 9);

            for ($i = 0; $i < strlen($dnicliente); $i++) {
                $letra = $dnicliente[$i];
                if (!in_array($letra, $numeros)) {
                    echo "El valor ingresado no es numérico.";
                    header("location: ../controller/error.php");
                    break;
                }
            }

            include("../model/admi/crudcliente.php");
            $obgesclient = new gestion_cliente();

            $valorclient = $obgesclient->vercliente($dnicliente);
            $tablaResultados = null;
            if (is_array($valorclient)) {
                list($id_cliente, $nombre_completo, $dni_cliente, $genero, $telefono, $direccion, $fecha_registro, $email) = $valorclient;
                if ($id_cliente != null) {
                    $tablaResultados .= "
                        <table id='tabla-buscar-client'>
                            <tr>
                                <th>id-cliente</th>
                                <th>nombre_completo</th>
                                <th>dni_cliente</th>
                                <th>genero</th>
                                <th>telefono</th>
                                <th>direccion</th>
                                <th>fecha_registro</th>
                                <th>email</th>
                            </tr>
                            <tr>
                                <td>" . $id_cliente . "</td>
                                <td>" . $nombre_completo . "</td>
                                <td>" . $dni_cliente . "</td>
                                <td>" . $genero . "</td>
                                <td>" . $telefono . "</td>
                                <td>" . $direccion . "</td>
                                <td>" . $fecha_registro . "</td>
                                <td>" . $email . "</td>
                            </tr>
                        </table>";
                    
                    // Redirigir a gestion_client.php con la variable 'tabla' en la URL
                    $editareliminar = "<div class='opcciones-cliente'>
                    
                    <form  name='editar-cliente' class='opcion-editar'>
                        <h4>Editar</h4>
                        <label >Nombre Apellidos</label>
                        <input type='text' name='nom-client' id='nom-client' required>

                        <label>DNI</label>
                        <input type='number' name='dni-client' id='dni-client' required>

                        <label>Genero</label>
                        <select id='opcion-genero' name='opcion-genero'>
                            <option value='' disabled selected hidden>Seleccionar</option>
                            <option value='M'>Masculino</option>
                            <option value='F'>Femenino</option>
                        </select>

                        <label>Telefono</label>
                        <input type='number' name='cel-client' id='cel-client' required>

                        <label>Direccion</label>
                        <input type='text' name='direc-client' id='direc-client' required>

                        <label>Email</label>
                        <input type='email' name='email-client' id='email-client' required>
                        <input type='submit' value='editar' name='editar-client'>
                    </form>

                    
                    <form name='eliminar-client' class='eliminar-client'>
                        <h4>Eliminar</h4>
                        <label>ID</label>
                        <input type='number' name='id-eliminar' required>
                        <input type='submit' value='eliminar' name='btn-eliminar-client'>
                    </form>

                </div>";

                    $url = "../view/funciones_administrador/gestion_client.php?tabla=" . urlencode($tablaResultados) . "&user=" . urlencode($user). "&editareliminar=" . urlencode($editareliminar);
                    header("location: " . $url);
                   exit; // Detener la ejecución del script después de la redirección
                } else {
                    $tablaResultados .= "No existe ningún cliente con ese DNI";
                    $url = "../view/funciones_administrador/gestion_client.php?tabla=" . urlencode($tablaResultados) . "&user=" . urlencode($user);
                    header("location: " . $url);
                    exit; // Detener la ejecución del script después de la redirección
                }
            }
        //}
    }
    public function editar(){
        
    }
    public function eliminar(){

    }
    
}

?>