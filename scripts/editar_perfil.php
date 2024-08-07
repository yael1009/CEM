<?php
require_once 'class/database.php';

$user = $_SESSION['id'];

$main = new main();    
$conexion = new database;
$conexion->conectardb();

// Recibir datos del formulario
$nombres = $main->limpiarstring(!empty($_POST['nombres']) ? $_POST['nombres'] : NULL);
$a_p = $main->limpiarstring(!empty($_POST['a_p']) ? $_POST['a_p'] : NULL);
$a_m = $main->limpiarstring(!empty($_POST['a_m']) ? $_POST['a_m'] : NULL);
$tel = $main->limpiarstring(!empty($_POST['tel']) ? $_POST['tel'] : NULL);
$correo = $main->limpiarstring(!empty($_POST['correo']) ? $_POST['correo'] : NULL);
$usuario = $main->limpiarstring(!empty($_POST['usuario']) ? $_POST['usuario'] : NULL);
$compania = $main->limpiarstring(!empty($_POST['uso']) ? $_POST['uso'] : NULL);
$cargo = $main->limpiarstring(!empty($_POST['cargo']) ? $_POST['cargo'] : NULL);

$foto = NULL;

/* Verificar que el correo ingresado no exista en la BD */
if($correo!=""){
    if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
        if($conexion->contar("SELECT correo FROM personas WHERE correo='$correo'")>0){
            echo $main->mensaje_error("El correo electrónico ingresado ya se encuentra registrado, por favor elija otro");
            exit();
        }
    }else{
        echo $main->mensaje_error("Ha ingresado un correo electrónico no valido");
        exit();
    } 
}

/* Verificar que el usuario ingresado no exista en la BD */
if($conexion->contar("SELECT usuario FROM usuarios WHERE usuario='$usuario'")>0){
    echo $main->mensaje_error("El USUARIO ingresado ya se encuentra registrado, por favor elija otro");
    exit();
}

/* Verificar datos del formulario */ 
if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}",$nombre))
    {
        echo $main->mensaje_error("EL NOMBRE no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}",$apaterno))
    {
        echo $main->mensaje_error("El apellido paterno no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}",$amaterno))
    {
        echo $main->mensaje_error("El apellido materno no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[0-9]+",$tel)) //no m convence el pattern
    {
        echo $main->mensaje_error("El telefono no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-Z0-9$@.]{7,100}",$correo)) //meter ese patter
    {
        echo $main->mensaje_error("El correo no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-Z0-9]{4,50}",$usuario))
    {
        echo $main->mensaje_error("El usuario no coincide con el formato solicitado");
        exit();
    }

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

    if(!$_POST['usuario']==NULL){
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
