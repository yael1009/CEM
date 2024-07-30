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
                        $query = $db->preparar("CALL CREAR_USUARIO_CL(:nombre, :apaterno, :amaterno, :correo, :tel, :usuario, :pass)");
                        $query->bindParam(':nombre', $nombre);
                        $query->bindParam(':apaterno', $apaterno);
                        $query->bindParam(':amaterno', $amaterno);
                        $query->bindParam(':correo', $correo);
                        $query->bindParam(':tel', $tel);
                        $query->bindParam(':usuario', $usuario);
                        $query->bindParam(':pass', $pass);

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
?>