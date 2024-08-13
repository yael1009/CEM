<?php
    include "class/main.php";
    include 'class/database.php';

    $db = new Database($_SESSION['usuario']);
    $main = new main();
    //$db->conectardb();
    $fecha = $main->limpiarstring($_POST['fecha'] ?? '');
    $tipo_trabajo = $main->limpiarstring($_POST['tipo_trabajo'] ?? '');
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

    if($main->verificar_datos("[a-zA-Z0-9$@.-]{7,2000}",$comentarios))
    {
        echo $main->mensaje_error("EL NOMBRE no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}",$calle))
    {
        echo $main->mensaje_error("El apellido paterno no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}",$colonia))
    {
        echo $main->mensaje_error("El apellido materno no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}",$ciudad))
    {
        echo $main->mensaje_error("El apellido materno no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}",$estado))
    {
        echo $main->mensaje_error("El apellido materno no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[0-9]+",$n_ext)) //no m convence el pattern
    {
        echo $main->mensaje_error("El telefono no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[0-9]+",$n_int)) //no m convence el pattern
    {
        echo $main->mensaje_error("El telefono no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("^[0-9]{5}$",$codigo_postal)) //meter ese patter
    {
        echo $main->mensaje_error("El correo no coincide con el formato solicitado");
        exit();
    }

    if($main->verificar_datos("[a-zA-Z0-9$@.-]{7,2000}",$referencia))
    {
        echo $main->mensaje_error("El usuario no coincide con el formato solicitado");
        exit();
    }

        // Servicios seleccionados
        $servicios = $_POST['servicios'] ?? [];
        $servicios_json = json_encode($servicios);

        include 'scripts/carga.php';
	/*== Comprobando si se ha seleccionado una imagen ==*/
	//if($_FILES['archivos']['name']!="" && $_FILES['archivos']['size']>0){}
    
        // Archivos subidos
        $archivos = [];
        if (isset($_FILES['archivos'])) {
            foreach ($_FILES['archivos']['tmp_name'] as $key => $tmp_name) {
                $file_content = file_get_contents($tmp_name);
                $archivos[] = base64_encode($file_content);
            }
        }
        $archivos_json = json_encode($archivos);


        $query=("CALL creacion_solicitud(".$_SESSION['id'].", '$calle', '$n_ext', '$n_int', '$colonia', '$codigo_postal', '$ciudad', '$estado', '$referencia', '$fecha_esperada', '$tipo_trabajo', '$comentarios', $servicios_json, $archivos_json)");

        if ($db->ejecutar($query)) {
                header("refresh:3;url=index.php?vista=home");
            echo "<div class='alert alert-success'>SOLICITUD REGISTRADA</div>";
            exit();
        } else {
          /*  if(is_file($img_dir.$foto)){
                chmod($img_dir.$foto, 0777);
                unlink($img_dir.$foto);
            }*/
            echo "<div class='alert alert-danger'>ERROR AL REGISTRAR LA SOLICITUD</div>";
        } 
    $db->desconectardb();
?>