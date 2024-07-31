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
    if(is_file("views/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){

        /*== Cerrar sesion ==
        if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
            include "views/logout.php";
            exit();
        }*/

        // NAVBAR
        include 'inc/navbar.php'; 

        include "views/".$_GET['vista'].".php";

        // FOOTER
        include 'inc/footer.php'; 
        
    }else{
            if($_GET['vista']=="login"){
                include "views/login.php";
            }else{
                include "views/404.php";
            }
        }
    ?>
</body>
</html>