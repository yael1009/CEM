
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Cem_estilo.css">
    
    <link rel="stylesheet" href="../cem_estilo2.css">
    <link rel="stylesheet" href="../cem_estilo3.css">
    <style>
        .navbar-custom {
            background-color: #800000;
            color: white;
        }
        .profile-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 1000px;
            width: 100%;
            margin: 20px 0;
        }
        .profile-profile-img {
            height: 60px;
            width: 60px;
            border-radius: 50%;
        }
        .btn-custom {
            background-color: #800000;
            color: white;
            border-radius: 15px;
            margin: 10px;
        }

        .btn-custom a{
            color: white;
        }
        .btn-custom:hover a{
            color: #800000;
            border-color: #800000;
        }

        .btn-custom:hover {
            background-color: white;
            color: #800000;
            border-color: #800000;
        }
        .table-custom {
            width: 100%;
            margin: 20px 0;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            overflow: hidden;
        }
        .table-custom th, .table-custom td {
            padding: 10px;
            text-align: left;
        }
        .table-header {
            background-color: #800000;
            color: white;
            text-align: center;
        }
        .footer {
            background-color: #800000;
            color: white;
            padding: 20px;
            width: 100%;
            text-align: center;
            display: flex;
            justify-content: space-around;
        }
        .footer div {
            flex: 1;
        }
        th.fixed-width {
            width: 450px; /* Ajusta este valor según tus necesidades */
        }
        .padd{
            padding-left: 290px;
        }
    </style>
</head>
<body>
    <!--Perfil-->
    <form action="" method="post" class="FormularioAjax">

        <div class="container d-flex flex-column align-items-center">
            <h1 class="mt-4">Mi Perfil</h1>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-custom">
                    <a href="index.php?vista=perfil" class="custom-link">Cancelar Edicion</a>
                </button>
                <button type="submit" class="btn btn-custom">Guardar</button>
            </div>
            <div class="profile-container mt-4">
                <div class="table-custom">
                    <div class="table-header p-2">
                        Datos Personales
                    </div>
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th class="fixed-width">Nombres:</th>
                                <td><input type="text" name="nombres" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}" class="form-control" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="fixed-width">Apellido Paterno:</th>
                                <td><input type="text" name="a_p" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}" class="form-control"></td>
                            </tr>
                            <tr>
                                <th class="fixed-width">Apellido Materno:</th>
                                <td><input type="text" name="a_m" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}" class="form-control"></td>
                            </tr>
                            <tr>
                                <th class="fixed-width">Teléfono:</th>
                                <td><input type="text" name="tel" pattern="[0-9]+" class="form-control"></td>
                            </tr>
                            <tr>
                                <th class="fixed-width">Correo:</th>
                                <td><input type="email" name="correo" pattern="[a-zA-Z0-9$@.]{7,100}" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-custom">
                    <div class="table-header p-2">
                        Datos de Usuario
                    </div>
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                            <th class="fixed-width">Foto de Perfil</th>
                                <th class="text-center" colspan="2"><img src="../Integradora/img/foto_perfil.jpg" alt="Foto de perfil" class="profile-profile-img"></th>
                            </tr>
                            <tr>
                                <th class="fixed-width">Usuario:</th>
                                <td><input type="text" name="usuario" pattern="[a-zA-Z0-9]{4,50}" class="form-control"></td>
                            </tr>
                            <tr>
                                <th class='fixed-width'>Uso de la cuenta:</th>
                                <td><input type='text' name='uso' pattern='[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}' class='form-control'></td>
                            </tr>
                            <tr>
                                <th class='fixed-width'>Cargo de la compañía:</th>
                                <td><input type='text' name='cargo' pattern='[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}' class='form-control'></td>
                            </tr>
                            <?php
                            if(isset($_SESSION['administrador']) || isset($_SESSION['g_usuarios']) || isset($_SESSION['g_cotizaciones'])){
                                echo "
                            <tr>
                                <th class='fixed-width'>RFC:</th>
                                <td><input type='text' name='RFC' pattern='^[A-ZÑ&]{3}\d{6}[A-Z0-9]{3}$' class='form-control'></td>
                            </tr>
                            <tr>
                                <th class='fixed-width'>NSS:</th>
                                <td><input type='text' name='NSS' pattern='^\d{2}\d{2}\d{2}\d{5}$' class='form-control'></td>
                            </tr>
                            ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

    <?php

    if(isset($_POST['usuario']) || isset($_POST['uso']) || isset($_POST['cargo']) || isset($_POST['nombres']) || 
    isset($_POST['a_p']) || isset($_POST['a_m']) || isset($_POST['tel']) || isset($_POST['correo']) || isset($_POST['RFC']) || isset($_POST['NSS'])){

        require_once "class/main.php";
        require_once "scripts/editar_perfil.php";

    }
	?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>