<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Cem_estilo.css">
    <link rel="stylesheet" href="../cem_estilo2.css">
    <link rel="stylesheet" href="../cem_estilo3.css">
    <style>
        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            width: 100%;
            margin: 20px 0;
        }
        .btn-custom {
            background-color: #800000;
            color: white;
            border-radius: 15px;
        }
        .form-control {
            border: 2px solid #800000;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        .centra-boton {
            display: flex;
            justify-content: space-around;
            border-top: none;
        }
        
        .custom-link:hover {
            color: black; /* Cambia el color a negro al pasar el cursor */
        }
    </style>
</head>
<body>
    <!--NAV-->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="Cliente_Inicio.html">CEM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Cliente_Inicio.html">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="clientes_servicios.html">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="cliente_cotizar.html">Cotizar</a></li>
                <li class="nav-item"><a class="nav-link" href="cliente_portafolio.html">Portafolio</a></li>
                <li class="nav-item"><a class="nav-link" href="cliente_contacto.html">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="cliente_inicio_sesion.html"><strong>Perfil</strong> <img src="../img/foto_perfil.jpg" alt="Foto de perfil" class="profile-img"></a></li>
            </ul>
        </div>
    </nav>
    
    <!--login-->
    <div class="container d-flex justify-content-center">
        <div class="login-container">
            <div style="text-align: center;">
                <h1 class="mb-4">Crear Cuenta</h1>
                <p class="rojito">¡Regístrate hoy y accede a servicios exclusivos! Disfruta de una experiencia personalizada y soluciones a medida. ¡Únete ahora y aprovecha todas nuestras ventajas!</p>
            </div>
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label" for="nombre">Nombres</label>
                    <input class="form-control" type="text" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="apaterno">Apellido Paterno</label>
                    <input class="form-control" type="text" name="apaterno" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="amaterno">Apellido Materno</label>
                    <input class="form-control" type="text" name="amaterno" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tel">Telefono</label>
                    <input class="form-control" type="text" name="tel" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="correo">Correo:</label>
                    <input class="form-control" type="email" name="correo" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="usuario">Usuario:</label>
                    <input class="form-control" type="text" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="pass">Password:</label>
                    <input class="form-control" type="password" name="pass" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="compañia">Uso de la Cuenta</label>
                    <input class="form-control" type="text" name="compañia" placeholder="Personal/Compañia">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="cargo">Cargo en la Compañia</label>
                    <input class="form-control" type="text" name="cargo" placeholder="Personal/Propietario/Gerente/Constructor">
                </div>
                <div class="centra-boton">
                    <button type="submit" class="btn btn-custom">Crear Cuenta</button>
                    <button type="button" class="btn btn-custom">Iniciar sesión</button>
                </div>
            </form>
            <?php
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

                    $db->desconectardb();
                }
            ?>
        </div>
    </div>
    <!--Foot-->
    <footer class="footer mt-4">
        <div class="left">
            <strong>CEM</strong>
        </div>
        <div class="center">
            <p><strong>Contacto directo:</strong><br>
            Ing. Esteban Corgoba<br>
            cemconstrucciones@hotmail.com<br>
            871 184 1980<br>
            871 754 4054</p>
        </div>
        <div class="right">
            <p><strong>Dirección:</strong><br>
            Calle Sierra La Gloria S/N Colonia<br>
            MA. Mercado de Lopez Sanchez,<br>
            Torreon Coahuila</p>
        </div>
    </footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
