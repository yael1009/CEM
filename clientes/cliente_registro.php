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
<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="Cliente_Inicio.html">CEM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="Cliente_Inicio.html"><strong>Inicio</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="clientes_servicios.html">Servicios</a></li>
            <li class="nav-item"><a class="nav-link" href="cliente_cotizar.html">Cotizar</a></li>
            <li class="nav-item"><a class="nav-link" href="cliente_portafolio.html">Portafolio</a></li>
            <li class="nav-item"><a class="nav-link" href="cliente_contacto.html">Contacto</a></li>
            <li class="nav-item"><a class="nav-link" href="cliente_inicio_sesion.html">Perfil <img src="img/foto_perfil.jpg" alt="Foto de perfil" class="profile-img"></a></li>
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
            <form action="" method="post" autocomplete="off" class="FormularioAjax">
                <div class="mb-3">
                    <label class="form-label" for="nombre">Nombres</label>
                    <input class="form-control" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}" maxlength="60" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="apaterno">Apellido Paterno</label>
                    <input class="form-control" type="text" name="apaterno" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="amaterno">Apellido Materno</label>
                    <input class="form-control" type="text" name="amaterno" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tel">Telefono</label>
                    <input class="form-control" type="text" name="tel" pattern="[0-9]+" maxlength="10" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="correo">Correo:</label>
                    <input class="form-control" type="email" name="correo" maxlength="100" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="usuario">Usuario:</label>
                    <input class="form-control" type="text" name="usuario" pattern="[a-zA-Z0-9]{4,50}" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="pass">Password:</label>
                    <input class="form-control" type="password" name="pass" pattern="[a-zA-Z0-9$@.]{7,100}" maxlength="100" required>
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
			if(isset($_POST['nombre']) && isset($_POST['apaterno']) && isset($_POST['amaterno']) && isset($_POST['tel'])
            && isset($_POST['correo']) && isset($_POST['usuario']) && isset($_POST['pass']) && isset($_POST['compañia'])
            && isset($_POST['cargo'])){
				require_once "../scripts/c_registro.php";
                include "../class/main.php";
                include '../class/database.php';
			}
		    ?>

        </div>
    </div>
    <!--Foot-->
    <?php
    include "../inc/footer.php";

    //no jalo alaberga     <script src="../js/ajax.js"></script>
    include "../inc/navbar_celular.php";
    ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
