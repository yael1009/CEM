<?php
    session_start();
    
    include'../class/database.php';
    include'../class/usuario.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $error_message = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new Database();
        $db->conectardb();

        $user = $_POST['usuario'];
        $password = $_POST['password'];
        $userVerify;

        $query = "call verify_usuario ('$user', '$password', '$userVerify')";
        $query = $db -> ejecutar($query);

        if ($userVerify==1) {
            header("Location: ../clientes/cliente_inicio.html");
            die;
        }
        else {
            $error_message = "<div class='alert alert-danger'>Nombre de usuario o contraseña incorrectos.</div>";
        }

        $db->desconectardb();
    }

    header("Location: ../clientes/cliente_inicio_sesion.php");
    die;
?>