    <!--Perfil-->
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-4">Mi Perfil</h1>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-custom"> <a href="index.php?vista=mis_cotizaciones" class="custom-link">Mis Cotizaciones</a></button>
            <button type="button" class="btn btn-custom"> <a href="index.php?vista=cliente_registrado_perfil_administrar" class="custom-link">Administrar Cuenta</a></button>
            <button type="button" class="btn btn-custom"> <a href="index.php?vista=logout" class="custom-link">Cerrar sesión</a></button>
        </div>
        <div class="profile-container mt-4">
            <div class="table-custom">
                <div class="table-header p-2">
                    Datos Personales
                </div>
                <?php

                    include 'C:\Users\balon\OneDrive\Escritorio\UTT\Cuatri 3\Aplicaciones Web\samp2\htdocs\CEM\scripts\info_sesion_perfil.php';

                ?>
                
        </div>
    </div>
