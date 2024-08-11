<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $main->limpiarstring( $_POST['accion']); // Nombre del campo que indica la acción (aceptar, cancelar, completado)

    if ($accion === 'cancelar') {
        if($rows->estado_orden !== NULL){
            $sql = "UPDATE ORDENES SET estado = 'Descartado' WHERE solicitud = $id_solicitud";
            $conexion->ejecutar($sql);
        }else{
            $sql = "UPDATE SOLICITUDES SET estado = 'Cancelado' WHERE id_solicitud = $id_solicitud";
            $conexion->ejecutar($sql);
        }
    } elseif ($accion === 'aceptar') {
        // Insertar en la tabla ORDENES
        $sql = "INSERT INTO ORDENES (solicitud) VALUES ('$id_solicitud')";
        $conexion->ejecutar($sql);
    } elseif ($accion === 'completado') {
        // Cambiar el estado a "Completado" en la tabla ORDENES
        $sql = "UPDATE ORDENES SET estado = 'Completado' WHERE solicitud = $id_solicitud";
        $conexion->ejecutar($sql);
        }

    // Redireccionar o mostrar un mensaje de éxito
   /* header('Location: solicitud.php?status=success');
    exit();*/
}
?>
