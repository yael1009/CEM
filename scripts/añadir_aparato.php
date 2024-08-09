<?php
require_once 'class/database.php';

$main = new main;
$conexion = new database;
$conexion->conectardb();

$nombre = $main->limpiarstring($_POST['nombre'] ?? '');
$potencia = $main->limpiarstring($_POST['potencia_nominal'] ?? '');

if (!$main->validar_campos_vacios([$nombre, $potencia])) {
    echo $main->mensaje_error("Todos los campos son requeridos");
    exit();
}

if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}",$nombre))
    {
        echo $main->mensaje_error("El nombre no coincide con el formato solicitado");
        exit();
    }

if($main->verificar_datos("[0-9]+",$potencia))
    {
        echo $main->mensaje_error("La potencia nominal no coincide con el formato solicitado");
        exit();
    }

/*== Verificando aparato ==*/
if($conexion->contar("SELECT dispositivo FROM dispositivos WHERE dispositivo='$nombre'")>0){
    echo $main->mensaje_error("El dispositivo ingresado ya se encuentra registrado, por favor elija otro");
    exit();
}

try{
    $query = "CALL CREAR_DISPO(
        :nombre,
        :potencia_nominal
        )";
        
        $stmt = $conexion->preparar($query);
        
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':potencia_nominal', $potencia, PDO::PARAM_INT);
        
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>¡Aparatp actualizado correctamente!</div>";
            } else {
                echo "<div class='alert alert-danger'>¡Error al actualizar el aparato!</div>";
            }
}catch(PDOException $e) {
    echo "Error: ".$e -> getMessage();
}

?>