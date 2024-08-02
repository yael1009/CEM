<div class="tab-pane fade show active" id="solicitudes" role="tabpanel" aria-labelledby="solicitudes-tab">
    <br>
    <?php



    $main=new main();

    // si no esta definida la variable se le asigna 1
    if(!isset($_GET['page'])){
        $pagina=1;
    }else{ //se recoge a variable y se convierte en entero
        $pagina=(int) $_GET['page'];
        if($pagina<=1){
            $pagina=1;
        }
    }

    $pagina=$main->limpiarstring($pagina);
    $url="index.php?vista=cotizaciones&page=";
    $registros=15;
    $busqueda="";




   // include '../class/database.php';
    $conexion = new database();
    $conexion->conectardb();

    $consulta = "SELECT * FROM preview_solicitud";
    $tabla = $conexion -> seleccionar($consulta);

    foreach($tabla as $reg)
    {
        //if para cambiar la clase segun el estado
    $clase = ($reg->estado == "No visto") ? 'seen' : 'Nseen';
    echo "
    <div class='row'>
        <div class='col-md-12'>
            <div class='project-card $clase'>
                <img src='img/foto_perfil_clientes.jpg' alt='Foto de perfil'>
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