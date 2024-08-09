<nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?vista=home">CEM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto padd">
                    <li class="nav-item"><a class="nav-link" href="index.php?vista=home">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?vista=servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?vista=cotizar">Cotizar</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?vista=portafolio">Portafolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?vista=contacto">Contacto</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrar
                        </a>
                        <div class="dropdown-menu darkeRed" aria-labelledby="navbarDropdownMenuLink">
                        <div class="darkeRed">
                            <a class="dropdown-item link disabled" href="index.php?vista=administrador">Administrador</a>
                        </div>
                        <div class="red">
                            <a class="dropdown-item link" href="index.php?vista=aparatos">Aparatos</a>
                        </div>
                        <hr class="dropdown-divider">
                        <div class="darkeRed">
                            <a class="dropdown-item link disabled" href="index.php?vista=cotizaciones">Cotizaciones</a>
                        </div>
                        <div class="red">
                            <a class="dropdown-item link" href="index.php?vista=ordenes_solicitudes">Solicitudes</a>
                            <a class="dropdown-item link" href="roles_clientes.html">En Progreso</a>
                            <a class="dropdown-item link" href="roles_clientes.html">Completado</a>
                            <a class="dropdown-item link" href="roles_clientes.html">Cancelado</a>
                        </div>
                        <hr class="dropdown-divider">
                        <div class="darkeRed">
                            <a class="dropdown-item link disabled" href="dropdowns.html">Roles</a>
                        </div>
                        <div class="red">
                            <a class="dropdown-item link" href="index.php?vista=clientes">Clientes</a>
                            <a class="dropdown-item link" href="index.php?vista=empleados">Personal</a>
                        </div>
                    </div>
                </li>
            </ul>


                <?php
                // Verificar si la sesión está iniciada
                if (isset($_SESSION['usuario'])) {
                    // Si la sesión está iniciada, mostrar este contenido
                    echo //"Bienvenido, " . htmlspecialchars($_SESSION['usuario']) . "!";

                    '<ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php?vista=perfil">Perfil <img src="img/foto_perfil.jpg" alt="Foto de perfil" class="profile-img"></a></li>
                    </ul>';
                } else {
                    // Si la sesión no está iniciada, mostrar otro contenido
                    echo
                    '<ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php?vista=login">Iniciar sesion <img src="https://via.placeholder.com/70" alt="Foto de perfil" class="profile-img"></a></li>
                    </ul>';
                }
                ?>
        </div>
    </nav>