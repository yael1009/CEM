<?php
require_once 'class\database.php';
require_once 'class\main.php';
$main = new main;

$user = $_SESSION['usuario'];
$conexion = new database($_SESSION['usuario']);
//$conexion->conectardb();


$conceptop = !empty($_POST['concepto']) ? $main->limpiarstring($_POST['concepto']) : null;
$insumop = !empty($_POST['insumo']) ? $main->limpiarstring($_POST['insumo']) : null;
$cantidadp = !empty($_POST['cantidad']) ? $main->limpiarstring($_POST['cantidad']) : null;
$unitariop = !empty($_POST['unitario']) ? $main->limpiarstring($_POST['unitario']) : null;

if ($conceptop && $main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,1000}", $conceptop)) {
    echo $main->mensaje_error("El concepto ingresado no coincide con el formato solicitado");
    exit();
}

if ($cantidadp && $main->verificar_datos("[0-9]+", $cantidadp)) {
    echo $main->mensaje_error("La cantidad ingresada no coincide con el formato solicitado");
    exit();
}

if ($unitariop && $main->verificar_datos("[0-9]+", $unitariop)) {
    echo $main->mensaje_error("El precio unitario no coincide con el formato solicitado");
    exit();
}

try{

    $query = "CALL EDITAR_CONCEPTO(
    :id_concepto,
    :insumo,
    :concepto,
    :cantidad,
    :unitario
    );";


    $stmt = $conexion->preparar($query);

    $stmt->bindParam(':id_concepto', $id_concepto, PDO::PARAM_STR);
    $stmt->bindParam(':concepto', $conceptop, PDO::PARAM_STR);
    $stmt->bindParam(':insumo', $insumop, PDO::PARAM_INT);
    $stmt->bindParam(':cantidad', $cantidadp, PDO::PARAM_INT);
    $stmt->bindParam(':unitario', $unitariop, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>¡Concepto actualizado correctamente!</div>";
    } else {
        echo "<div class='alert alert-danger'>¡Error al actualizar el concepto!</div>";
    }

}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
};

?>