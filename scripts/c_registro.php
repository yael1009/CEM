<?php
    include "../class/main.php";
    include '../class/database.php';

    $db = new Database();
    $main = new main();
    $db->conectardb();

    $nombre = $main->limpiarstring($_POST['nombre'] ?? '');
    $apaterno = $main->limpiarstring($_POST['apaterno'] ?? '');
    $amaterno = $main->limpiarstring($_POST['amaterno'] ?? '');
    $tel = $main->limpiarstring($_POST['tel'] ?? '');
    $correo = $main->limpiarstring($_POST['correo'] ?? '');
    $usuario = $main->limpiarstring($_POST['usuario'] ?? '');
    $pass = $main->limpiarstring($_POST['pass'] ?? '');
    $compañia = $main->limpiarstring($_POST['compañia'] ?? '');
    $cargo = $main->limpiarstring($_POST['cargo'] ?? '');

    if (!$main->validar_campos_vacios([$nombre,$apaterno,$amaterno,$tel,$correo,$usuario,$pass,$compañia,$cargo])) {
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

    if($main->verificar_datos("[a-zA-Z0-9$@.]{7,100}",$pass))
    {
        echo $main->mensaje_error("La contraseña no coincide con el formato solicitado");
        exit();
    }

            /*== Verificando email ==*/
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


    /*== Verificando usuario ==*/
    if($db->contar("SELECT usuario FROM usuarios WHERE usuario='$usuario'")>0){
        echo $main->mensaje_error("El USUARIO ingresado ya se encuentra registrado, por favor elija otro");
        exit();
    }

    /*== ESTO ES POR SI LLEGAMOS A METER UNA VALIDACION DOBLE DE CONTRASEÑA 
    if($clave_1!=$clave_2){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Las CLAVES que ha ingresado no coinciden
            </div>
        ';
        exit();
    }else{
        $clave=password_hash($clave_1,PASSWORD_BCRYPT,["cost"=>10]);
    } ==*/

    /*   ESTA ES UNA MEJOR PRACTICA PERO POR COMO NOS ENSEÑO GARAY PS NO 
        $query = $db->preparar("CALL CREAR_USUARIO_CL(:nombre, :apaterno, :amaterno, :correo, :tel, :usuario, :pass, :compañia, :cargo)");
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apaterno', $apaterno);
        $query->bindParam(':amaterno', $amaterno);
        $query->bindParam(':correo', $correo);
        $query->bindParam(':tel', $tel);
        $query->bindParam(':usuario', $usuario);
        $query->bindParam(':pass', $pass);
        $query->bindParam(':compañia', $compañia);
        $query->bindParam(':cargo', $cargo);
/*
        $query->execute();

        if($query->rowCount()==1){
            echo '
                <div class="notification is-info is-light">
                    <strong>¡USUARIO REGISTRADO!</strong><br>
                    El usuario se registro con exito
                </div>
            ';
        }else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    No se pudo registrar el usuario, por favor intente nuevamente
                </div>
            ';
        }
        /*/
        $query=("CALL CREAR_USUARIO_CL('$nombre', '$apaterno', '$amaterno', '$correo', '$tel', '$usuario', '$pass', '$compañia', '$cargo')");

        if ($db->ejecutar($query)) {
            echo "<div class='alert alert-success'>CLIENTE REGISTRADO</div>";
            header("refresh:3;url=Cliente_inicio.html");
            exit();
        } else {
            echo "<div class='alert alert-danger'>ERROR AL REGISTRAR CLIENTE</div>";
        }
    $db->desconectardb();
?>