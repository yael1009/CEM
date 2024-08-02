<?php // TODO ESTO ES UNA PRUEBA, A LION
require 'inc/session_start.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include 'inc/head.php'; ?>
</head>
<body>
    <?php
    //si no viene definida o esta vacia se da un valor por defecto
    if(!isset($_GET['vista']) || $_GET['vista']==""){
        $_GET['vista']="home";
    }

    //is file comprueba si existe un archivo en el directorio
    if(is_file("views/".$_GET['vista'].".php")){

        //Esta parte es importante pq son las vistas permitidas para todos, ya despues voy a moverle a los roles
        if ($_GET['vista'] != 'login' && $_GET['vista'] != '404' && $_GET['vista'] != 'home' 
            && $_GET['vista']!="servicios" && $_GET['vista']!="cotizar" && $_GET['vista']!="portafolio"
            && $_GET['vista']!="contacto" && $_GET['vista']!="login" && $_GET['vista']!="registro") 
        {
            if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
                header("Location: index.php?vista=home");
                exit();
            }        
        }

        // NAVBAR
        include 'inc/navbar.php'; 

        if(isset($_GET['tab']) || $_GET['tab']==""){
            include "views/".$_GET['vista'].".php&tab=".$_GET['tab']."";
        }
        else{        
            include "views/".$_GET['vista'].".php";
        }
        /*Esta nacada era para q se vea bn en cel pero no valio madresilla
        include "inc/script.php";*/

        // FOOTER
        include 'inc/footer.php'; 
        
    }else{
            //Esto es para que si no encontro ninguna vista te envie aqui
            include "views/404.php";
        }
    ?>
</body>
</html>