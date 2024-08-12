<?php
    include "class/main.php";
    include 'class/database.php';

    $db = new Database();
    $main = new main();
    $db->conectardb();
    $fecha = $main->limpiarstring($_POST['fecha'] ?? '');
    $tipo_trabajo = $main->limpiarstring($_POST['tipo_trabajo'] ?? '');
    $servicos = $main->limpiarstring($_POST['servicios'] ?? '');
    $archivos = $main->limpiarstring($_POST['img_serv_1'] ?? '');
    $comentarios = $main->limpiarstring($_POST['comentarios'] ?? '');
    $calle = $main->limpiarstring($_POST['calle'] ?? '');
    $colonia = $main->limpiarstring($_POST['colonia'] ?? '');
    $n_ext = $main->limpiarstring($_POST['numero_ext'] ?? '');
    $n_int = $main->limpiarstring($_POST['numero_int'] ?? '');
    $ciudad = $main->limpiarstring($_POST['ciudad'] ?? '');
    $estado = $main->limpiarstring($_POST['esatdo'] ?? '');
    $codigo_postal = $main->limpiarstring($_POST['codigo_postal'] ?? '');
    $referencia = $main->limpiarstring($_POST['referencia'] ?? '');


    if (!$main->validar_campos_vacios([$fecha,$tipo_trabajo,$servicios,$calle,$colonia,$n_ext,$ciudad,$estado,$codigo_postal])) {
        echo $main->mensaje_error("Todos los campos son requeridos");
        exit();
    }

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

    /*if($main->verificar_datos("[a-zA-Z0-9$@.]{7,100}",$correo)) //meter ese patter
    {
        echo $main->mensaje_error("El correo no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-Z0-9]{4,50}",$usuario))
    {
        echo $main->mensaje_error("El usuario no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-Z0-9$@.]{7,100}",$pass))
    {
        echo $main->mensaje_error("La contraseña no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}",$compañia))
    {
        echo $main->mensaje_error("La compañia no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}",$cargo))
    {
        echo $main->mensaje_error("el cargo no coincide con el formato solicitado");
        exit();
    }

            // Verificando email

    if($correo!=""){
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            if($db->contar("SELECT correo FROM personas WHERE correo='$correo'")>0){
                echo $main->mensaje_error("El correo electrónico ingresado ya se encuentra registrado, por favor elija otro");
                exit();
            }
        }else{
            echo $main->mensaje_error("Ha ingresado un correo electrónico no valido");
            exit();
        } 
    }


    // Verificando usuario
    if($db->contar("SELECT usuario FROM usuarios WHERE usuario='$usuario'")>0){
        echo $main->mensaje_error("El USUARIO ingresado ya se encuentra registrado, por favor elija otro");
        exit();
    }*/

        $query=("CALL CREAR_USUARIO_CL('$nombre', '$apaterno', '$amaterno', '$correo', '$tel', '$usuario', '$pass', '$compañia', '$cargo')");

        if ($db->ejecutar($query)) {
                header("refresh:3;url=index.php?vista=home");
            echo "<div class='alert alert-success'>CLIENTE REGISTRADO</div>";
            exit();
        } else {
            echo "<div class='alert alert-danger'>ERROR AL REGISTRAR CLIENTE</div>";
        } 
    $db->desconectardb();
?>