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
            max-width: 400px;
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
        
        .custom-link:hover 
        {
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
                <h1 class="mb-4">Iniciar sesión</h1>
                <p class="rojito">Si ya está registrado en nuestra página, puede ingresar sus datos aquí. Si aún no tiene una cuenta, puede crear una cuenta nueva para acceder al servicio.</p>

            </div>
            <form action="" method="post" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label" for="usuario">Usuario:</label>
                    <input class="form-control" type="text" name="usuario" pattern="[a-zA-Z0-9]{4,50}" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
                </div>
                <div class="centra-boton">
                    <button type="button" class="btn btn-custom"><a class="custom-link" href="cliente_registro.php">Crear Cuenta</a></button>
                    <button type="submit" class="btn btn-custom">Iniciar sesión</button>
                </div>
            </form>
            
            <?php
			if(isset($_POST['usuario']) && isset($_POST['password'])){
				require_once "../class/main.php";
				require_once "../scripts/iniciar_sesion.php";
			}
		    ?>

        </div>
    </div>
    <!--Foot-->
    <?php
    include "../inc/footer.php";
    ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>