<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Cem_estilo.css">
    <link rel="stylesheet" href="../cem_estilo2.css">
    <link rel="stylesheet" href="../cem_estilo3.css">
    <style>
        

        .personal-card .details {
            flex: 1;
            display: flex;
            justify-content: space-between;
            margin: 0;
            text-align: center;
            align-items: center;
        }

        .btn-custom {
            background-color: #800000;
            color: white;
            border-radius: 15px;
            margin: 10px;
        }

        .add-button-container {
            text-align: right;
            margin: 20px 0;
        }
        /*Esta parte es importante pq el background no se va a poner solo
        lo vas a poner dependiendo si ya lo vio o no, en la clase proyect-card no pone el fondo, 
        si lo dejas asi se queda completamente en blanco, por eso esta el seen y el not seen (Nseen)
        estos para solicitudes. Las que esten en progreso van a seguir teniendo el seen y las que cancalaron las puse mas opacas
        si no te gustan los colores tu se los cambias:/*/
        .seen{
            background-color: #f1f1f1;
        }
        .Nseen{
            background-color: #b9b9b9;
        }
        .cancel{
            background-color: #646464;
            color: #ffffff;
        }
        .cancela{
            color: #ff5b5b;
        }
        .project-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            display: flex;
            align-items: center;
        }
        .project-card img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .project-card .project-info {
            flex-grow: 1;
        }

        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            margin-bottom: -1px;
            color: black;
        }
        .nav-tabs .nav-link.active {
            color: #800000;
        }
        .profile-img-cuad {
            height: 60px;
            width: 60px;
            border-radius: 50%;
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
                <li class="nav-item"><a class="nav-link" href="../clientes/Cliente_Inicio.html">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="../clientes/clientes_servicios.html">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="../clientes/cliente_cotizar.html">Cotizar</a></li>
                <li class="nav-item"><a class="nav-link" href="../clientes/cliente_portafolio.html">Portafolio</a></li>
                <li class="nav-item"><a class="nav-link" href="../clientes/cliente_contacto.html">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="roles_inicio.html"><strong>Ordenes</strong></a></li>
                <li class="nav-item"><a class="nav-link" href="../clientes/cliente_inicio_sesion.html">Perfil <img src="../img/foto_perfil.jpg" alt="Foto de perfil" class="profile-img"></a></li>
            </ul>
        </div>
    </nav>

    <!-- Ordenes -->
    <div class="container mt-4">
        <h1 class="text-center">Ordenes</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="solicitudes-tab" data-toggle="tab" href="#solicitudes" role="tab" aria-controls="solicitudes" aria-selected="true">Solicitudes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="progreso-tab" data-toggle="tab" href="#progreso" role="tab" aria-controls="progreso" aria-selected="false">En Progreso</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completado-tab" data-toggle="tab" href="#completado" role="tab" aria-controls="completado" aria-selected="false">Completado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cancelado-tab" data-toggle="tab" href="#cancelado" role="tab" aria-controls="cancelado" aria-selected="false">Cancelados</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- Solicitudes -->
            <div class="tab-pane fade show active" id="solicitudes" role="tabpanel" aria-labelledby="solicitudes-tab">
                <br>
                <?php
                include '../class/database.php';
                $conexion = new database();
                $conexion->conectardb();
        
                $consulta = "SELECT usuarios.usuario, solicitudes.fecha_esperada, solicitudes.ubicacion, solicitudes.estado
                FROM solicitudes join usuarios on solicitudes.usuario = usuarios.id_usuario";
                $tabla = $conexion -> seleccionar($consulta);
        
                foreach($tabla as $reg)
                {
                $clase = ($reg->estado == "No visto") ? 'seen' : 'Nseen';
                echo "
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='project-card $clase'>
                            <img src='https://via.placeholder.com/70' alt='Foto de perfil'>
                            <div class='project-info'>
                                <p><strong>$reg->usuario</strong></p>
                                <p>$reg->fecha_esperada</p>
                                <p>$reg->ubicacion</p>
                            </div>
                            <a href='#' class='text-danger'>expandir</a>
                        </div>
                    </div>
                </div>
                ";
                }
                $conexion->desconectardb();
                ?>
            </div>
        </div>
            <!-- Progreso -->
            <div class="tab-pane fade" id="progreso" role="tabpanel" aria-labelledby="progreso-tab">
                <br>
                <div class="col-md-12">
                    <div class="project-card seen">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="text-danger">expandir</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-card seen">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="text-danger">expandir</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-card seen">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="text-danger">expandir</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-card seen">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="text-danger">expandir</a>
                    </div>
                </div>
            </div>
            <!-- Completados -->
            <div class="tab-pane fade" id="completado" role="tabpanel" aria-labelledby="completado-tab">
                <br>
                <div class="col-md-12">
                    <div class="project-card seen">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="text-danger">expandir</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-card seen">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="text-danger">expandir</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-card seen">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="text-danger">expandir</a>
                    </div>
                </div>
            </div>
            <!-- Cancelados -->
            <div class="tab-pane fade" id="cancelado" role="tabpanel" aria-labelledby="cancelado-tab">
                <br>
                <div class="col-md-12">
                    <div class="project-card cancel">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="cancela">expandir</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-card cancel">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="cancela">expandir</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-card cancel">
                        <img src="https://via.placeholder.com/70" alt="Foto de perfil">
                        <div class="project-info">
                            <p><strong>Nombre del Proyecto</strong></p>
                            <p>Usuario</p>
                            <p>Direccion / calle / numero</p>
                        </div>
                        <a href="#" class="cancela">expandir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Foot -->
    <footer class="footer mt-4">
        <div class="left">
            CEM
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
    <!-- Bootstrap 4 JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
