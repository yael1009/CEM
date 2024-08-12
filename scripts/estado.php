<?php

$accion = $main->limpiarstring($_POST['accion']); // Limpiar la acción

if ($accion == 'cancelar') {
    if($rows->estado_orden !== NULL){
        $sql = "UPDATE ORDENES SET estado = 'Descartado' WHERE solicitud = :id_solicitud";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([':id_solicitud' => $id_solicitud]);
    } else {
        $sql = "UPDATE SOLICITUDES SET estado = 'Cancelado' WHERE id_solicitud = :id_solicitud";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([':id_solicitud' => $id_solicitud]);
    }
} elseif ($accion == 'aceptar') {
    $sql = "INSERT INTO ORDENES (solicitud) VALUES (:id_solicitud)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([':id_solicitud' => $id_solicitud]);
} elseif ($accion == 'completado') {
    $sql = "UPDATE ORDENES SET estado = 'Completado' WHERE solicitud = :id_solicitud";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([':id_solicitud' => $id_solicitud]);
}


?>
