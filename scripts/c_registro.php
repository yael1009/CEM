<?php /*

                    <!--enctype="multipart/form-data se usa cuando en un formulario se quiere enviar archvios-->
                    <form action="" enctype="multipart/form-data">

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



        $query=("CALL CREAR_USUARIO_CL('$nombre', '$apaterno', '$amaterno', '$correo', '$tel', '$usuario', '$pass', '$compañia', '$cargo')");

        if ($db->ejecutar($query)) 
        {
            echo "<div class='alert alert-success'>CLIENTE REGISTRADO</div>";
            header("refresh:3;url=Cliente_inicio.html");
            exit();
        } else {
            echo "<div class='alert alert-danger'>ERROR AL REGISTRAR CLIENTE</div>";
        }

    $db->desconectardb();*/




    /*
    ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                include'../class/database.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $db = new Database();
                    $db->conectardb();

                    $nombre = $_POST['nombre'] ?? '';
                    $apaterno = $_POST['apaterno'] ?? '';
                    $amaterno = $_POST['amaterno'] ?? '';
                    $tel = $_POST['tel'] ?? '';
                    $correo = $_POST['correo'] ?? '';
                    $usuario = $_POST['usuario'] ?? '';
                    $pass = $_POST['pass'] ?? '';
                    $compañia = $_POST['compañia'] ?? '';
                    $cargo = $_POST['cargo'] ?? '';

                    if (empty($nombre) || empty($apaterno) || empty($amaterno) || empty($tel) || empty($correo) || empty($usuario) || empty($pass) || empty($compañia) || empty($cargo)) {
                        echo "<div class='alert alert-danger'>Error: Todos los campos son requeridos</div>";
                    } else {
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

                        if ($query->execute()) {
                            echo "<div class='alert alert-success'>CLIENTE REGISTRADO</div>";
                            header("refresh:3;url=Cliente_inicio.html");
                            exit();
                        } else {
                            echo "<div class='alert alert-danger'>ERROR AL REGISTRAR CLIENTE</div>";
                        }
                    }

                    $db->desconectar
    */
?>

<?php
/*
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "../class/main.php";
    include '../class/database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $db = new Database();
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

        if (!$main->validar_campos_vacios($nombre,$apaterno,$amaterno,$tel,$correo,$usuario,$pass,$compañia,$cargo)) {
            echo "<div class='alert alert-danger'>Error: Todos los campos son requeridos</div>";
            exit();
        }

        if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}",$nombre))
        {
            $main->mensaje_error("EL NOMBRE");
            exit();
        }

        else {
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

            if ($query->execute()) {
                echo "<div class='alert alert-success'>CLIENTE REGISTRADO</div>";
                header("refresh:3;url=Cliente_inicio.html");
                exit();
            } else {
                echo "<div class='alert alert-danger'>ERROR AL REGISTRAR CLIENTE</div>";
            }
        }

        $db->desconectardb();
    }
        */
?>


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

    if($main->verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$correo)) //meter ese patter
    {
        echo $main->mensaje_error("El correo no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-Z0-9]{4,50}",$usuario))
    {
        echo $main->mensaje_error("El usuario no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$pass))
    {
        echo $main->mensaje_error("La contraseña no coincide con el formato solicitado");
        exit();
    }

            /*== Verificando email ==
    if($correo!=""){
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $check_email=$db->seleccionar("SELECT correo FROM personas WHERE correo='$correo'");
            if($check_email=$db->rowCount()>0){
                echo $main->mensaje_error("El correo electrónico ingresado ya se encuentra registrado, por favor elija otro");
                exit();
            }
        }else{
            echo $main->mensaje_error("Ha ingresado un correo electrónico no valido");
            exit();
        } 
    } */

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


    /*== Verificando usuario ==
    $check_usuario=$db->seleccionar("SELECT usuario FROM usuarios WHERE usuario='$usuario'");
    if($check_usuario->rowCount()>0){
        echo $main->mensaje_error("El USUARIO ingresado ya se encuentra registrado, por favor elija otro");
        exit();
    } */

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

    //else {
    /*
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
        //*/
    $db->desconectardb();
?>