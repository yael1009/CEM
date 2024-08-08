<?php
require_once 'class/database.php';

$main = new main;
$conexion = new database;
$conexion->conectardb();

$user = $_SESSION['id'];

//Datos del formulario, ahora solo se asignan si tienen valor
$fechap = !empty($_POST['fecha']) ? $main->limpiarstring($_POST['fecha']) : null;
$callep = !empty($_POST['calle']) ? $main->limpiarstring($_POST['calle']) : null;
$coloniap = !empty($_POST['colonia']) ? $main->limpiarstring($_POST['colonia']) : null;
$numerop_ext = !empty($_POST['numero_ext']) ? $main->limpiarstring($_POST['numero_ext']) : null;
$numerop_int = !empty($_POST['numero_int']) ? $main->limpiarstring($_POST['numero_int']) : null;
$ciudadp = !empty($_POST['ciudad']) ? $main->limpiarstring($_POST['ciudad']) : null;
$estadop = !empty($_POST['estado']) ? $main->limpiarstring($_POST['estado']) : null;
$codigop_postal = !empty($_POST['codigo_postal']) ? $main->limpiarstring($_POST['codigo_postal']) : null;
$referenciap = !empty($_POST['referencia']) ? $main->limpiarstring($_POST['referencia']) : null;
$tipo_trabajop = !empty($_POST['tipo_trabajo']) ? $main->limpiarstring($_POST['tipo_trabajo']) : null;
$comentariop = !empty($_POST['comentarios']) ? $main->limpiarstring($_POST['comentarios']) : null;

// Validaciones
if ($callep && $main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}", $callep)) {
    echo $main->mensaje_error("La calle no coincide con el formato solicitado");
    exit();
}

if ($coloniap && $main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}", $coloniap)) {
    echo $main->mensaje_error("La colonia no coincide con el formato solicitado");
    exit();
}

if ($numerop_ext && $main->verificar_datos("[0-9]+", $numerop_ext)) {
    echo $main->mensaje_error("El numero exterior no coincide con el formato solicitado");
    exit();
}

if ($numerop_int && $main->verificar_datos("[0-9]+", $numerop_int)) {
    echo $main->mensaje_error("El numero interior no coincide con el formato solicitado");
    exit();
}

if ($ciudadp && $main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}", $ciudadp)) {
    echo $main->mensaje_error("La ciudad no coincide con el formato solicitado");
    exit();
}

if ($estadop && $main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}", $estadop)) {
    echo $main->mensaje_error("El estado no coincide con el formato solicitado");
    exit();
}

if ($codigop_postal && $main->verificar_datos("^[0-9]{5}$", $codigop_postal)) {
    echo $main->mensaje_error("El codigo postal no coincide con el formato solicitado");
    exit();
}

if ($referenciap && $main->verificar_datos("[a-zA-Z0-9$@.-]{7,2000}", $referenciap)) {
    echo $main->mensaje_error("La referencia no coincide con el formato solicitado");
    exit();
}

if ($comentariop && $main->verificar_datos("[a-zA-Z0-9$@.-]{7,2000}", $comentariop)) {
    echo $main->mensaje_error("Los comentarios no coinciden con el formato solicitado");
    exit();
}

try {
    $query = ("CALL EDITAR_MI_COTIZACION(
        :id,
        :fecha,
        :tipo_trabajo,
        :comentarios,
        :calle,
        :colonia,
        :numero_ext,
        :numero_int,
        :codigo_postal,
        :ciudad,
        :estado,
        :referencia
    )");

    $stmt = $conexion->preparar($query);

    $stmt->bindParam(':id', $user, PDO::PARAM_INT);
    $stmt->bindParam(':fecha', $fechap, PDO::PARAM_STR);
    $stmt->bindParam(':calle', $callep, PDO::PARAM_STR);
    $stmt->bindParam(':colonia', $coloniap, PDO::PARAM_STR);
    $stmt->bindParam(':numero_ext', $numerop_ext, PDO::PARAM_STR);
    $stmt->bindParam(':numero_int', $numerop_int, PDO::PARAM_STR);
    $stmt->bindParam(':ciudad', $ciudadp, PDO::PARAM_STR);
    $stmt->bindParam(':estado', $estadop, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_postal', $codigop_postal, PDO::PARAM_STR);
    $stmt->bindParam(':referencia', $referenciap, PDO::PARAM_STR);
    $stmt->bindParam(':tipo_trabajo', $tipo_trabajop, PDO::PARAM_STR);
    $stmt->bindParam(':comentarios', $comentariop, PDO::PARAM_STR);

    if (!$_POST['id'] == NULL) {
        $_SESSION['id'] = $_POST['id'];
    }

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>¡Cotización actualizada correctamente!</div>";
    } else {
        echo "<div class='alert alert-danger'>¡Error al actualizar la cotización!</div>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
