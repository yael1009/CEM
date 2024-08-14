<?php
$conexion = new database($_SESSION['usuario']);
$main = new main;

$aparato = !empty($_POST['aparato']) ? $main->limpiarstring($_POST['aparato']) : null;
$naparatos = !empty($_POST['N_aparatos']) ? $main->limpiarstring($_POST['N_aparatos']) : null;

if ($naparatos && $main->verificar_datos("[0-9]+", $naparatos)) {
    echo $main->mensaje_error("La cantidad ingresada no coincide con el formato solicitado");
    exit();
}

try{
    $query = "";

}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
};

?>