<?php
require_once 'class/database.php';

$user = $_SESSION['id'];

$conexion = new database;
$conexion->conectardb();

// Recibir datos del formulario
$nombres = !empty($_POST['nombres']) ? $_POST['nombres'] : NULL;
$a_p = !empty($_POST['a_p']) ? $_POST['a_p'] : NULL;
$a_m = !empty($_POST['a_m']) ? $_POST['a_m'] : NULL;
$tel = !empty($_POST['tel']) ? $_POST['tel'] : NULL;
$correo = !empty($_POST['correo']) ? $_POST['correo'] : NULL;
$usuario = !empty($_POST['usuario']) ? $_POST['usuario'] : NULL;
$compania = !empty($_POST['uso']) ? $_POST['uso'] : NULL;
$cargo = !empty($_POST['cargo']) ? $_POST['cargo'] : NULL;

$foto = NULL;

try {
    $query = "CALL EDITAR_USER_CLIENTE(
        :id,
        :usuario,
        :foto,
        :nombres,
        :a_p,
        :a_m,
        :correo,
        :tel,
        :uso,
        :cargo
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

    if ($stmt->execute()) {
        echo "Perfil actualizado correctamente.";
    } else {
        echo "Error al actualizar el perfil.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
