<?php
    include'../class/database.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $db = new Database();
    $db ->conectardb();

    extract($_POST);

        $nombre = $_POST['nombre'] ?? '';
        $apaterno = $_POST['apaterno'] ?? '';
        $amaterno = $_POST['amaterno'] ?? '';
        $tel = $_POST['tel'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $usuario = $_POST['usuario'] ?? '';
        $pass = $_POST['pass'] ?? '';
        $compañia = $_POST['compañia'] ?? '';
        $cargo = $_POST['cargo'] ?? '';



        $query=("CALL CREAR_USUARIO_CL('$nombre', '$apaterno', '$amaterno', '$correo', '$tel', '$usuario', '$pass')");

        if ($db->ejecutar($query)) 
        {
            echo "<div class='alert alert-success'>CLIENTE REGISTRADO</div>";
            header("refresh:3;url=Cliente_inicio.html");
            exit();
        } else {
            echo "<div class='alert alert-danger'>ERROR AL REGISTRAR CLIENTE</div>";
        }

    $db->desconectardb();
?>