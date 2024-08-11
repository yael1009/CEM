<?php
require_once 'class/database.php';

$user = $_SESSION['id'];

$main = new main();    
$conexion = new database;
$conexion->conectardb();

// Recibir datos del formulario
$nombres = !empty($_POST['nombres']) ? $main->limpiarstring($_POST['nombres']) : NULL;
$a_p = !empty($_POST['a_p']) ? $main->limpiarstring($_POST['a_p']) : NULL;
$a_m = !empty($_POST['a_m']) ? $main->limpiarstring($_POST['a_m']) : NULL;
$tel = !empty($_POST['tel']) ? $main->limpiarstring($_POST['tel']) : NULL;
$correo = !empty($_POST['correo']) ? $main->limpiarstring($_POST['correo']) : NULL;
$usuario = !empty($_POST['usuario']) ? $main->limpiarstring($_POST['usuario']) : NULL;
$compania = !empty($_POST['uso']) ? $main->limpiarstring($_POST['uso']) : NULL;
$cargo = !empty($_POST['cargo']) ? $main->limpiarstring($_POST['cargo']) : NULL;
$RFC = !empty($_POST['RFC']) ? $main->limpiarstring($_POST['RFC']) : NULL;
$NSS = !empty($_POST['NSS']) ? $main->limpiarstring($_POST['NSS']) : NULL;

$foto = NULL;

/* Verificar que el correo ingresado no exista en la BD */
if ($correo && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    if ($conexion->contar("SELECT correo FROM personas WHERE correo='$correo'") > 0) {
        echo $main->mensaje_error("El correo electrónico ingresado ya se encuentra registrado, por favor elija otro");
        exit();
    }
} elseif ($correo) {
    echo $main->mensaje_error("Ha ingresado un correo electrónico no válido");
    exit();
}

/* Verificar que el usuario ingresado no exista en la BD */
if ($usuario && $conexion->contar("SELECT usuario FROM usuarios WHERE usuario='$usuario'") > 0) {
    echo $main->mensaje_error("El USUARIO ingresado ya se encuentra registrado, por favor elija otro");
    exit();
}

/* Verificar datos del formulario */
if ($nombres && $main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}", $nombres)) {
    echo $main->mensaje_error("EL NOMBRE no coincide con el formato solicitado");
    exit();
}

if ($a_p && $main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}", $a_p)) {
    echo $main->mensaje_error("El apellido paterno no coincide con el formato solicitado");
    exit();
}

if ($a_m && $main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}", $a_m)) {
    echo $main->mensaje_error("El apellido materno no coincide con el formato solicitado");
    exit();
}

if ($tel && $main->verificar_datos("[0-9]+", $tel)) {
    echo $main->mensaje_error("El teléfono no coincide con el formato solicitado");
    exit();
}

if ($correo && $main->verificar_datos("[a-zA-Z0-9$@.]{7,100}", $correo)) {
    echo $main->mensaje_error("El correo no coincide con el formato solicitado");
    exit();
}

if ($usuario && $main->verificar_datos("[a-zA-Z0-9]{4,50}", $usuario)) {
    echo $main->mensaje_error("El usuario no coincide con el formato solicitado");
    exit();
}

if ($RFC && $main->verificar_datos("^[A-ZÑ&]{3,4}\d{6}[A-Z\d]{3}$", $RFC)) {
    echo $main->mensaje_error("El RFC no coincide con el formato solicitado");
    exit();
}

if ($NSS && $main->verificar_datos("\d{11}", $NSS)) {
    echo $main->mensaje_error("El Numero de Seguro Social no coincide con el formato solicitado");
    exit();
}

try {
    $query = "CALL EDITAR_USER(
        :id,
        :usuario,
        :foto,
        :nombres,
        :a_p,
        :a_m,
        :correo,
        :tel,
        :uso,
        :cargo,
        :RFC,
        :NSS
    )";

    $stmt = $conexion->preparar($query);

    $stmt->bindParam(':id', $user, PDO::PARAM_INT);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);
    $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
    $stmt->bindParam(':a_p', $a_p, PDO::PARAM_STR);
    $stmt->bindParam(':a_m', $a_m, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':uso', $compania, PDO::PARAM_STR);
    $stmt->bindParam(':cargo', $cargo, PDO::PARAM_STR);
    $stmt->bindParam(':RFC', $RFC, PDO::PARAM_STR);
    $stmt->bindParam(':NSS', $NSS, PDO::PARAM_INT);

    if (!empty($_POST['usuario'])) {
        $_SESSION['usuario'] = $_POST['usuario'];
    }

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>¡Perfil actualizado correctamente!</div>";
    } else {
        echo "<div class='alert alert-danger'>¡Error al actualizar el perfil!</div>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
