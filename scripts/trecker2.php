<?php
    include '../class/database.php';
    $conexion = new Database();
    $conexion ->conectarDB();
    // Obtener datos del formulario

    extract($_POST);

    $contrasena = $_POST['pass'];
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);


    // Preparar consulta para llamar al procedimiento almacenado
    $query = $conexion->preparar("CALL CREAR_USUARIO_CL(:nombre, :apaterno, :amaterno, :correo, :tel, :usuario, :pass, :compañia, :cargo)");

    // Vincular parámetros
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':apaterno', $apaterno);
    $query->bindParam(':amaterno', $amaterno);
    $query->bindParam(':correo', $correo);
    $query->bindParam(':tel', $tel);
    $query->bindParam(':usuario', $usuario);
    $query->bindParam(':pass', $pass);
    $query->bindParam(':compañia', $compañia);
    $query->bindParam(':cargo', $cargo);

    // Ejecutar consulta
    if ($query->execute()) {
        header("Location: ../clientes/Cliente_Inicio.html");
        $db->desconectarDB();
    } else {
        echo "Error al crear usuario: " . $query->errorInfo()[2];
    }

    // Cerrar conexión
    $conexion = null;
?>