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
            <?php include "scripts/solicitud.php" ?>
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
