<?php
$conexion = new database($_SESSION['usuario']);

$consulta = "SELECT INSUMOS.INSUMO, INSUMOS.ID_INSUMO FROM INSUMOS;";

$resultado = $conexion->seleccionar($consulta);

foreach($resultado as $datos){
    echo "<option value=$datos->ID_INSUMO>$datos->INSUMO</option>";
}

?>