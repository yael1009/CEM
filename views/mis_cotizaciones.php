    <!--Mis Cotizaciones-->
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-4">Mis Cotizaciones</h1>
        <div class="button-container">
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#nuevoModal">Hacer nueva cotización</button>
            <button type="button" class="btn btn-custom"><a class="custom-link" href="cliente_registrado_perfil.html">Regresar</a></button>
        </div>
        <div class="container-custom mt-4">
            <div class="table-custom">
                <div class="table-header p-2">
                    ID_ORDEN
                </div>
                <?php
                    include 'class/main.php';
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
                    $url="index.php?vista=mis_cotizaciones&page=";
                    $registros=1;
                    $busqueda="";

                    require_once "./scripts/ver_mis_cotizaciones.php";
                ?>
            </div>
            <div class="button-container">
                <button type="button" class="btn btn-custom">Cancelar orden</button>
                <button type="button" class="btn btn-custom">Editar</button>
            </div>
        </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="nuevoModalLabel">Solicitud de Cotizacion</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form2">
                        <label class="form-label" for="detalle">¿Qué fecha prefiere para programar la realización del trabajo?</label>
                        <input class="form-control" type="date" name="detalle">
                        <label class="form-label" for="ubicacion">¿Cuál es la ubicación donde se realizará el trabajo?</label>
                        <input class="form-control" type="text" name="ubicacion">
                        <label class="form-label" for="tipo_trabajo">Tipo de trabajo:</label>
                        <div class="radio-group">
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="tipo_trabajo" id="domestico" value="Domestico">
                                <label class="form-check-label" for="domestico">Domestico</label>
                            </div>
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="tipo_trabajo" id="industrial" value="Industrial">
                                <label class="form-check-label" for="industrial">Industrial</label>
                            </div>
                        </div>
                        <label class="form-label" for="archivo">Subir Archivos</label>
                        <input class="form-control" type="file" name="archivo">
                        <label class="form-label" for="comentarios">Comentarios</label>
                        <textarea class="form-control" name="comentarios" rows="3"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="enviarBtn">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 3.1 -->
    <div class="modal fade" id="ultimoModal" tabindex="-1" aria-labelledby="ultimoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ultimoModalLabel">Terminaste el Formulario</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <p>La cotización enviada es preliminar y está sujeta a cambios, ya que no hemos realizado una visita al sitio. Una vez que efectuemos la visita, podremos evaluar con exactitud sus necesidades y ofrecerle una propuesta definitiva. La información proporcionada es solo un punto de partida basado en el formulario de inicio.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-custom">Descargar</button>
                    <button type="button" class="btn btn-primary"><a class="custom-link" href="cliente_contacto.html">Contactanos</a></button>
                </div>
            </div>
        </div>
    </div>