<?php
$conexion = new database($_SESSION['usuario']);

$consulta = "SELECT DISPOSITIVOS.ID_DISPOSITIVO, DISPOSITIVOS.DISPOSITIVO FROM DISPOSITIVOS";

$resultado = $conexion->seleccionar($consulta);

foreach($resultado as $datos){
    echo "<option value=$datos->ID_DISPOSITIVO>$datos->DISPOSITIVO</option>";
}

?>