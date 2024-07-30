<?php
    include '../class/conexionbd.php';
    $conexion = new Database();
    $conexion ->conectarDB();
    // Obtener datos del formulario


    extract($_POST);

    $contrasena = $_POST['contrasena'];
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);


    // Preparar consulta para llamar al procedimiento almacenado
    $stmt = $conexion->preparar("CALL crear_usuario(:correo, :usuario, :contrasena, :nombre, :apellido_paterno, :apellido_materno, :genero, :fecha_nacimiento, :telefono)");

    // Vincular parámetros
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasena', $hash);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido_paterno', $apellido_paterno);
    $stmt->bindParam(':apellido_materno', $apellido_materno);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $stmt->bindParam(':telefono', $telefono);

    // Ejecutar consulta
    if ($stmt->execute()) {
        header("Location: ../../index.php");
        $db->desconectarDB();
    } else {
        echo "Error al crear usuario: " . $stmt->errorInfo()[2];
    }

    // Cerrar conexión
    $conexion = null;
?>