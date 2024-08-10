    <!--Mis Cotizaciones-->
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-4">Mis Cotizaciones</h1>
        <div class="button-container">
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#nuevoModal">Hacer nueva cotización</button>
            <button type="button" class="btn btn-custom"><a class="custom-link" href="index.php?vista=perfil">Regresar</a></button>
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

                    if(isset($_POST['cancelar'])){
                        require_once "./scripts/cancelar_orden.php";
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="nuevoModalLabel">Solicitud de Cotizacion</h1>
                </div>
                <div class="modal-body">
                    <form id="form2" autocomplete="off">
                        <label class="form-label" for="detalle">¿Qué fecha prefiere para programar la realización del trabajo?</label>
                        <input class="form-control" type="date" name="detalle">
                        
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
                        <div class="form-group">
                            <label class="form-label">Seleccione los Servicios:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cliente">
                                <label class="form-check-label" for="cliente">
                                Instalación de Sistemas Eléctricos:
                                </label>
                            </div>
                        </div>
                        <label class="form-label" for="archivo">Subir Archivos</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img_serv" name="img_serv">
                            <label class="custom-file-label" for="img_serv">Seleccionar archivo</label>
                        </div>
                        <br><br><button type="button" class="btn btn-custom">Agregar Otro Archivo</button><br>
                        <label class="form-label" for="comentarios">Comentarios</label>
                        <textarea class="form-control" name="comentarios" rows="3" pattern="[a-zA-Z0-9$@.-]{7,2000}" maxlength="2000"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="enviarBtn">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 3.1 -->
    <div class="modal fade" id="direccionModal" tabindex="-1" aria-labelledby="direccionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="direccionModalLabel">Direccion del Trabajo</h1>
                </div>
                <div class="modal-body">
                    <form action="" id="form3" autocomplete="off">
                        <label class="form-label" for="ubicacion">¿Cuál es la Direccion donde se realizará el trabajo?</label>
                            <div class="table-container">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="calle" placeholder="Calle" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="colonia" placeholder="Colonia" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="numero_ext" placeholder="Numero Exterior" pattern="[0-9]+" maxlength="10">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="numero_int" placeholder="Numero Interior" pattern="[0-9]+" maxlength="10">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="ciudad" placeholder="Ciudad" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="estado" placeholder="Estado" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="codigo_postal" placeholder="Codigo Postal" pattern="^[0-9]{5}$" maxlength="5">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="referencia" placeholder="Referencia" pattern="[a-zA-Z0-9$@.-]{7,2000}" maxlength="2000">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="continuarBtn">Continuar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 4.1 -->
    <div class="modal fade" id="ultimoModal" tabindex="-1" aria-labelledby="ultimoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ultimoModalLabel">Terminaste el Formulario</h1>
                </div>
                <div class="modal-body">
                    <p>La cotización enviada es preliminar y está sujeta a cambios, ya que no hemos realizado una visita al sitio. Una vez que efectuemos la visita, podremos evaluar con exactitud sus necesidades y ofrecerle una propuesta definitiva. La información proporcionada es solo un punto de partida basado en el formulario de inicio.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-custom"><a class="custom-link link" href="index.php?vista=mis_cotizaciones">Ver Mi Cotizacion</a></button>
                    <button type="button" class="btn btn-primary"><a class="custom-link link" href="index.php?vista=contacto">Contactanos</a></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Editar  -->
    <div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="nuevoModalLabel">Editar Mi Cotizacion</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th>Fecha de entrega óptima:</th>
                                    <td><input class="form-control" type="date" name="fecha"></td>
                                </tr>
                                <tr>
                                    <th colspan="2">Dirección:</th>
                                </tr>
                                <tr class="tablee">
                                    <td class="tablee">
                                        <input class="form-control" type="text" name="calle" placeholder="Calle" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100">
                                    </td>
                                    <td class="tablee">
                                        <input class="form-control" type="text" name="colonia" placeholder="Colonia" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100">
                                    </td>
                                </tr>
                                <tr class="tablee">
                                    <td class="tablee">
                                        <input class="form-control" type="text" name="numero_ext" placeholder="Numero Exterior" pattern="[0-9]+" maxlength="10">
                                    </td>
                                    <td class="tablee">
                                        <input class="form-control" type="text" name="numero_int" placeholder="Numero Interior" pattern="[0-9]+" maxlength="10">
                                    </td>
                                </tr>
                                <tr class="tablee">
                                    <td class="tablee">
                                        <input class="form-control" type="text" name="ciudad" placeholder="Ciudad" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100">
                                    </td>
                                    <td class="tablee">
                                        <input class="form-control" type="text" name="estado" placeholder="Estado" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100">
                                    </td>
                                </tr>
                                <tr class="tablee">
                                    <td class="tablee">
                                        <input class="form-control" type="text" name="codigo_postal" placeholder="Codigo Postal" pattern="^[0-9]{5}$" maxlength="5">
                                    </td>
                                    <td class="tablee">
                                        <input class="form-control" type="text" name="referencia" placeholder="Referencia" pattern="[a-zA-Z0-9$@.-]{7,2000}" maxlength="2000">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tipo trabajo:</th>
                                    <td>
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
                                </td>
                                </tr>
                                <tr>
                                    <th>Archivos enviados:</th>
                                    <td>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="img_serv" name="img_serv">
                                            <label class="custom-file-label" for="img_serv">Seleccionar archivo</label>
                                        </div>
                                        <br><br><button type="button" class="btn btn-custom">Agregar Otro Archivo</button><br>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Comentarios:</th>
                                    <td><textarea class="form-control" name="comentarios" rows="3" pattern="[a-zA-Z0-9$@.-]{7,2000}" maxlength="2000"></textarea></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="guardarBtn">Guardar</button>
                        </div>

                        <?php
if(isset($_POST['fecha']) || isset($_POST['calle']) || isset($_POST['colonia']) || isset($_POST['numero_ext']) || 
isset($_POST['numero_int']) || isset($_POST['ciudad']) || isset($_POST['estado']) || isset($_POST['codigo_postal']) || isset($_POST['referencia']) || 
isset($_POST['tipo_trabajo']) || isset($_POST['comentarios'])){

    require_once "class/main.php";
    require_once "scripts/script_editar_mi_cotizacion.php";

}
?>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <script>
        document.getElementById('enviarBtn').addEventListener('click', function() {
            $('#nuevoModal').modal('hide');
            $('#direccionModal').modal('show');
        });
        document.getElementById('continuarBtn').addEventListener('click', function() {
            $('#direccionModal').modal('hide');
            $('#ultimoModal').modal('show');
        });
    </script>