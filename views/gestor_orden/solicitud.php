<div class="tab-pane fade show active" id="solicitudes" role="tabpanel" aria-labelledby="solicitudes-tab">
    <br>
    <?php
    include '../class/database.php';
    $conexion = new database();
    $conexion->conectardb();

    $consulta = "SELECT * FROM preview_solicitud";
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