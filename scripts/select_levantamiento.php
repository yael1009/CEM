<?php
require_once 'class/database.php';

$conexion = new database($_SESSION['usuario']);

if (isset($_SESSION['id_levantamiento'])) {
    $id_levantamiento = $_SESSION['id_levantamiento'];
} else {
    die('Error: No se ha proporcionado el ID de la solicitud de servicio.');
}


$consulta2 = "SELECT LEVANTAMIENTOS.VOLTAJE, LEVANTAMIENTOS.AMPERAJE FROM LEVANTAMIENTOS
WHERE LEVANTAMIENTOS.ID_LEVANTAMIENTO = '$id_levantamiento';
";

$resultado2 = $conexion->seleccionar1($consulta2);

if(!empty($resultado2)){
    $datos = $resultado2;
    echo "<table class='table'>
            <tbody>
                <tr class='total-row'>
                    <th class='section-title text-right'>Voltaje del Circuito</th>
                    <td class='text-right'>'$datos->VOLTAJE'</td>
                </tr>
            </tbody>
        </table>
        <table class='table'>
            <tbody>
                <tr class='total-row'>
                    <th class='text-right'>Resultado:</th>
                    <td class='text-right'>'$datos->AMPERAJE'</td>
                </tr>
            </tbody>
        </table>";

}else{
    echo "No se encontraron datos";
}

$consulta = "SELECT DISPOSITIVOS.DISPOSITIVO, DISPOSITIVOS.POTENCIA, LEVANTAMIENTO_DISPOSITIVOS.N_APARATOS
FROM DISPOSITIVOS 
JOIN LEVANTAMIENTO_DISPOSITIVOS ON LEVANTAMIENTO_DISPOSITIVOS.DISPOSITIVO = DISPOSITIVOS.ID_DISPOSITIVO
JOIN LEVANTAMIENTOS ON LEVANTAMIENTO_DISPOSITIVOS.LEVANTAMIENTO = LEVANTAMIENTOS.ID_LEVANTAMIENTO
WHERE LEVANTAMIENTOS.ID_LEVANTAMIENTO = '$id_levantamiento';";

$resultado = $conexion->seleccionar($consulta);

if(!empty($resultado)){
    
    echo "<div class='service-divider'></div> -->
          <div class='table-responsive'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Aparato</th>
                        <th>Volts c/u</th>
                        <th>Cantidad</th>
                        <th colspan='2'>Acciones</th>
                    </tr>
                </thead>
                <tbody>";

    foreach($resultado as $datos2){
        echo "
            <tr>
                <td>'$datos2->DISPOSITIVO'</td>
                <td>'$datos2->POTENCIA'</td>
                <td>'$datos2->N_APARATOS'</td>
                <td>
                    <button type='button' class='btn btn-custom' data-toggle='modal' data-target='#editconceptModal'>Editar</button>
                </td>
                <td>
                    <button class='btn btn-custom'>Eliminar</button>
                </td>
            </tr>
        ";
    }

    echo "
            </tbody>
        </table>
    </div>   
    ";

}else{
    echo "No se encontraron datos";
}

?>