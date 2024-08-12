<?php
     include 'class/database.php';
    $main = new main();
	/*== Almacenando datos ==*/
    $usuario = $main->limpiarstring($_POST['usuario'] ?? '');
    $clave = $main->limpiarstring($_POST['password'] ?? '');


    /*== Verificando campos obligatorios ==*/
    if (!$main->validar_campos_vacios([$usuario,$clave])) {
        echo $main->mensaje_error("Todos los campos son requeridos");
        exit();
    }

    /*== Verificando integridad de los datos ==*/
    if($main->verificar_datos("[a-zA-Z0-9]{4,50}",$usuario))
    {
        echo $main->mensaje_error("El usuario no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-Z0-9$@.]{7,100}",$clave))
    {
        echo $main->mensaje_error("La contraseña no coincide con el formato solicitado");
        exit();
    }


    $bd = new database('invitado');
    //$bd->conectardb();
    $query=("CALL VERIFY_USUARIO ('$usuario', '$clave')");

    $tabla = $bd->seleccionar1($query);

    if($tabla ->output == 'Credenciales correctas'){
        $query2=("CALL creacion_sesion('$usuario')");
        $tabla2 = $bd->seleccionar($query2);

        foreach($tabla2 as $reg){
          //  session_name("Yo"); //talvez las quite se usamos el index,  
          //  session_start(); // si no estas usando el index quita los comentarios
            $_SESSION['id'] = $reg->id;
            $_SESSION['nombre'] = $reg->nombre;
            $_SESSION['apellido'] = $reg->apaterno;
            $_SESSION['usuario'] = $reg->usuario;
            if($reg->estado=="1"){
            /*$_SESSION['roles'] = array();
            $_SESSION['roles'][] = $reg->rol;
            }
            echo "Rol: ";
            foreach($_SESSION['roles'] as $rol){
                echo $rol . "<br>";
            }*/
            if($reg->rol=='Cliente'){
                $_SESSION['cliente'] = true;
            }
             if($reg->rol=='Gestor de Cotizaciones'){
                $_SESSION['g_cotizaciones'] = true;
            }
             if($reg->rol=='Gestor de Usuarios'){
                $_SESSION['g_usuarios'] = true;
            }
             if($reg->rol=='Administrador'){
                $_SESSION['administrador'] = true;
            }
            }
        }
/*
        echo "ID: " . $_SESSION['id'] . "<br>";
        echo "Nombre: " . $_SESSION['nombre'] . "<br>";
        echo "Apellido: " . $_SESSION['apellido'] . "<br>";
        echo "Usuario: " . $_SESSION['usuario'] . "<br>";
        echo "Rol: ";
        if(isset($_SESSION['cliente'])){
            echo $_SESSION['cliente'] . "<br>";
        } if(isset($_SESSION['g_cotizaciones'])){
            echo $_SESSION['g_cotizaciones'] . "<br>";
        } if(isset($_SESSION['g_usuarios'])){
            echo $_SESSION['g_usuarios'] . "<br>";
        } if(isset($_SESSION['administrador'])){
            echo $_SESSION['administrador'] . "<br>";
        }
        echo "------------------------<br>";
*/

        header("refresh:1;url=index.php?vista=home");
        echo "<div class='alert alert-success'>INICIO DE SESION EXITOSO</div>";
        exit();
    }
    else{
        echo $main->mensaje_error("El usuario o la contraseña son incorrectos");
        exit();
    }
 /*   if($check_user->rowCount()==1){

    	$check_user=$check_user->fetch();

    	if($check_user['usuario_usuario']==$usuario && password_verify($clave, $check_user['usuario_clave'])){
            session_name("Yo");
            session_start();
    		$_SESSION['id']=$check_user['usuario_id'];
    		$_SESSION['nombre']=$check_user['usuario_nombre'];
    		$_SESSION['apellido']=$check_user['usuario_apellido'];
    		$_SESSION['usuario']=$check_user['usuario_usuario'];

    		if(headers_sent()){
				echo "<script> window.location.href='index.php?vista=home'; </script>";
			}else{
				header("Location: index.php?vista=home");
			}

    	}else{
    		echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                Usuario o clave incorrectos
	            </div>
	        ';
    	}
    }else{
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Usuario o clave incorrectos
            </div>
        ';
    }

        // Llamar al procedimiento almacenado VERIFY_USUARIO
    $stmt = $mysqli->prepare("CALL VERIFY_USUARIO ('admin_cem', 'contraseña_hash1')");
    $stmt->bind_param("sb", $usuario, $clave);
    $stmt->execute();

    // Obtener el resultado del procedimiento almacenado
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Verificar si las credenciales son correctas
    if ($row['output'] == 'Credenciales correctas') {
        // Iniciar sesión y redirigir a la página de inicio
        session_name("Yo");
        session_start();
        $_SESSION['id'] = $check_user['usuario_id'];
        $_SESSION['nombre'] = $check_user['usuario_nombre'];
        $_SESSION['apellido'] = $check_user['usuario_apellido'];
        $_SESSION['usuario'] = $check_user['usuario_usuario'];

        if (headers_sent()) {
            echo "<script> window.location.href='index.php?vista=home'; </script>";
        } else {
            header("Location: index.php?vista=home");
        }
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Usuario o clave incorrectos
            </div>
        ';
    }
*/
    $db->desconectardb();