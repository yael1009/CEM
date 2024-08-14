<?php
require_once 'class/database.php';
require_once 'class/main.php';

$conexion = new database($_SESSION['usuario']);
$main = new main;

$id_ss = $_SESSION['id_ss'];
$concepto = $main->limpiarstring($_POST['concepto_a'] ?? '');
$insumo = $main->limpiarstring($_POST['insumo_a'] ?? '');
$cantidad = $main->limpiarstring($_POST['cantidad_a'] ?? '');
$unitario = $main->limpiarstring($_POST['unitario_a'] ?? '');

if (!$main->validar_campos_vacios([$concepto, $insumo, $cantidad, $unitario])) {
    echo $main->mensaje_error("Todos los campos son requeridos");
    exit();
}

if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,1000}",$concepto)) {
    echo $main->mensaje_error("El concepto no coincide con el formato solicitado");
    exit();
}

if($main->verificar_datos("[0-9]+",$cantidad)) {
    echo $main->mensaje_error("La cantidad no coincide con el formato solicitado");
    exit();
}

if($main->verificar_datos("[0-9]+",$unitario)) {
    echo $main->mensaje_error("El precio unitario no coincide con el formato solicitado");
    exit();
}

try{
    $query = "CALL INGRESAR_CONCEPTO(
        :id_ss,
        :concepto_a,
        :insumo_a,
        :cantidad_a,
        :unitaro_a
        )";

    $stmt = $conexion->preparar($query);

    $stmt->bindParam(':id_ss', $id_ss, PDO::PARAM_INT);
    $stmt->bindParam(':concepto_a', $concepto, PDO::PARAM_STR);
    $stmt->bindParam(':insumo_a', $insumo, PDO::PARAM_INT);
    $stmt->bindParam(':cantidad_a', $cantidad, PDO::PARAM_INT);
    $stmt->bindParam(':unitario_a', $unitario, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>!Concepto registrado correctamente!</div>";
    } else {
        echo "<div class='alert alert-danger'>¡Error al registrar el concepto!</div>";
    }


}catch(PDOException $e) {
    echo "Error: ".$e -> getMessage();
}

?>