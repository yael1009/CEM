<?php
require_once 'C:\Users\balon\OneDrive\Escritorio\UTT\Cuatri 3\Aplicaciones Web\samp2\htdocs\CEM\class\database.php';

$conexion = new database($_SESSION['usuario']);

if (isset($_SESSION['id_ss'])) {
    $id_ss = $_SESSION['id_ss'];
} else {
    die('Error: No se ha proporcionado el ID de la solicitud de servicio.');
}

$consulta = "SELECT 
    C.CONCEPTO,
    (SELECT I.INSUMO FROM INSUMOS I WHERE I.ID_INSUMO = C.INSUMO) AS INSUMO,
    (SELECT I.UNIDAD FROM INSUMOS I WHERE I.ID_INSUMO = C.INSUMO) AS UNIDAD,
    C.CANTIDAD,
    C.PRECIO_UNITARIO,
    C.IMPORTE,
    C.ID_CONCEPTO
FROM 
    CONCEPTOS C
JOIN 
    CATALOGOS CAT ON C.CATALOGO = CAT.ID_CATALOGO
WHERE 
    CAT.SOLICITUD_SERVICIO = '$id_ss';
";

$resultado = $conexion->seleccionar($consulta);

echo "<div class='table-responsive'>
        <table class='table tabla table-bordered'>
            <thead>
                <tr class='thBlanco'>
                    <th>Concepto</th>
                    <th>Insumo</th>
                    <th>Unidad</th>
                    <th>Cant.</th>
                    <th>Unitario</th>
                    <th>Importe</th>
                    <th colspan='2'>Acciones</th>
                </tr>
            </thead>
            <tbody>
    </div>";

foreach($resultado as $datos){
    echo "<tr>
    <td>{$datos->CONCEPTO}</td>
    <td>{$datos->INSUMO}</td>
    <td>{$datos->UNIDAD}</td>
    <td>{$datos->CANTIDAD}</td>
    <td>{$datos->PRECIO_UNITARIO}</td>
    <td>{$datos->IMPORTE}</td>
    <td>
        <form method='post' action='scripts/editar_concepto_catalogo.php'>
            <input type='hidden' name='id_concepto' value='{$datos->ID_CONCEPTO}'>
            <button type='button' class='btn btn-custom' data-toggle='modal' data-target='#editconceptModal' onclick='document.getElementById(\"id_concepto_edit\").value=\"{$datos->ID_CONCEPTO}\"'>Editar</button>
        </form>
    </td>
    <td>
        <button class='btn btn-custom'>Eliminar</button>
    </td>
  </tr>";
}

echo "</tbody>
    </table>";
?>
