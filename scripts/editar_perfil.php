<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    echo "No hay sesión iniciada.";
    exit;
}

$user = $_SESSION['usuario'];

require_once 'class/database.php';
require_once 'class/main.php';
require_once 'inc/session_start.php';

$conexion = new database;
$conexion -> conectardb();

$query = "UPDATE USUARIOS, PERSONAS, CLIENTES SET PERSONAS.NOMBRE = 'NombreNuevo', PERSONAS.A_P = 'ApellidoNuevo', PERSONAS.A_M = 'ApellidoNuevo', 
PERSONAS.CORREO = 'correillo@gmail.com', PERSONAS.TELEFONO = '8715151515', CLIENTES.COMPAÑIA = 'CompañiaNueva', CLIENTES.CARGO = 'CargoNuevo', 
USUARIOS.USUARIO = 'UsuarioNuevo', USUARIOS.CONTRASEÑA = 'CONTRAJEJE' WHERE USUARIOS.USUARIO = :usuario;"



?>