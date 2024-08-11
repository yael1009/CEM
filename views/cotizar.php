<div class="container">
        <div class="quote-section mt-4">
            <h1>Elaboremos una cotización</h1>
            <h3>¿Cómo funciona la cotización en línea?</h3>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="step">
                        <img src="img/cliente_img/cliente_cotizacion_paso1.jpeg" alt="Paso 1">
                        <h3>Paso 1</h3>
                        <p>Cuéntanos tu proyecto. Puedes incluir fotografías y archivos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step">
                        <img src="img/cliente_img/cliente_cotizacion_paso22.jpeg" alt="Paso 2">
                        <h3>Paso 2</h3>
                        <p>Recibiremos tu solicitud y nosotros agendaremos una cita.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step">
                        <img src="img/cliente_img/cliente_cotizacion_paso3.jpeg" alt="Paso 3">
                        <h3>Paso 3</h3>
                        <p>Elaboraremos una cotización en breve y te la enviaremos.</p>
                    </div>
                </div>
            </div>


            <p class="note">COTIZACIÓN SUJETA A CAMBIOS</p>
            <button class="btn btn-custom"
            <?php if (isset($_SESSION['usuario'])) { ?>
            data-bs-toggle="modal" data-bs-target="#registro">Comenzar cotización
            <?php }else{
            echo '><a class="custom-link" href="index.php?vista=login">Comenzar cotización</a>';
            } ?>
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrarse</h1>
                </div>
                <div class="modal-body">
                    <!--enctype="multipart/form-data se usa cuando en un formulario se quiere enviar archvios-->
                    <form action="" enctype="multipart/form-data" autocomplete="off">
                        <label class="form-label" for="nombre">Nombres</label>
                        <input class="form-control" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}" maxlength="60" required>
                        <label class="form-label" for="apaterno">Apellido Paterno</label>
                        <input class="form-control" type="text" name="apaterno" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30" required>
                        <label class="form-label" for="amaterno">Apellido Materno</label>
                        <input class="form-control" type="text" name="amaterno" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30" required>
                        <label class="form-label" for="tel">Telefono</label>
                        <input class="form-control" type="text" name="tel" pattern="[0-9]+" maxlength="10" required>
                        <label class="form-label" for="correo">Correo:</label>
                        <input class="form-control" type="email" name="correo" maxlength="100">
                        <label class="form-label" for="usuario">Usuario:</label>
                        <input class="form-control" type="text" name="usuario" pattern="[a-zA-Z0-9]{4,50}" maxlength="50" required>
                        <label class="form-label" for="pass">Password:</label>
                        <input class="form-control" type="password" name="pass" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
                        <label class="form-label" for="compañia">Uso de la Cuenta</label>
                        <input class="form-control" type="text" name="compañia" placeholder="Personal/Compañia" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100" required>
                        <label class="form-label" for="cargo">Cargo en la Compañia</label>
                        <input class="form-control" type="text" name="cargo" placeholder="Personal/Propietario/Gerente/Constructor" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,50}" maxlength="50" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-custom">Inicia Sesion</button>
                    <button type="button" class="btn btn-primary" id="registrarseBtn">Registrarse</button>
                </div>
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
                    <?php
                    // Obtener la fecha actua l
                    $hoy = date("Y-m-d");
                    
                    // Calcular la fecha máxima (por ejemplo, 1 año en el futuro)
                    $fechaMaxima = date("Y-m-d", strtotime("+1 year"));
                    ?>
                        <label class="form-label" for="detalle">¿Qué fecha prefiere para programar la realización del trabajo?</label>
                        <input class="form-control" type="date" name="fecha"
                        min="<?php echo $hoy; ?>" 
                        max="<?php echo $fechaMaxima; ?>">
                        
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
                                <?php 
                                include_once 'class/database.php';
                                $db = new Database($_SESSION['usuario']);
                                    $query="SELECT * FROM TIPO_SERVICIO ";
                                    $solicitudes = $db->seleccionar($query);
                                    foreach ($solicitudes as $rows2) {
                                        $query2="SELECT servicio FROM SERVICIOS  WHERE  tipo_servicio='".$rows2->id_tipo_servicio."'";
                                        $servicios = $db->seleccionar($query2);
        
                                        echo "<strong>".$rows2->tipo_servicio."</strong> <br>";
                                        foreach ($servicios as $rows3) {
                                            echo '<br>
                                            <input class="form-check-input" type="checkbox" name="servicios" value="'.$rows3->servicio.'" id="cliente">
                                            <label class="form-check-label" for="cliente">
                                            '.$rows3->servicio.'
                                            </label> <br>';
                                        }
                                        } 
                                $db->desconectardb(); 
                                ?>
                            </div>
                        </div>
                        
                        <label class="form-label" for="archivo">Subir Archivos</label>
                        <div id="contenedor-archivos">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_serv_1" name="img_serv_1" accept=".pdf">
                                <label class="custom-file-label" for="img_serv_1">Seleccionar archivo</label>
                            </div>
                        </div>

                        <br>
                        <button type="button" class="btn btn-custom" onclick="agregarArchivo()">Agregar Otro Archivo</button>
                        <br><br>

                        <script>
                            let contador = 1; 
                            function agregarArchivo() {
                                if (contador < 3) {
                                    contador++;
                                    const div = document.createElement('div');
                                    div.className = 'custom-file';
                                    div.innerHTML = `
                                        <input type="file" class="custom-file-input" id="img_serv_${contador}" name="img_serv_${contador}" accept=".pdf">
                                        <label class="custom-file-label" for="img_serv_${contador}">Seleccionar archivo</label>
                                    `;
                                    document.getElementById('contenedor-archivos').appendChild(div);
                                } else {
                                    alert('Solo puedes agregar un máximo de 3 archivos.');
                                }
                            }
                        </script>

                        <label class="form-label" for="comentarios">Comentarios</label>
                        <textarea class="form-control" name="comentarios" rows="3" pattern="[a-zA-Z0-9$@.-]{7,2000}" maxlength="2000"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="continuaBtn">Continuar</button>
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
                    <button type="submit" class="btn btn-primary" id="continuarBtn">Terminar</button>
                </div>
                <?php
                if(isset($_POST['fecha']) && isset($_POST['tipo_trabajo']) && isset($_POST['servicios']) && isset($_POST['calle'])
                && isset($_POST['colonia']) && isset($_POST['numero_ext']) && isset($_POST['ciudad']) && isset($_POST['estado'])
                && isset($_POST['codigo_postal'])){
                    require_once "scripts/insertar_solicitud.php";
                }
                ?>
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
    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script>

        document.getElementById('registrarseBtn').addEventListener('click', function() {
            $('#registro').modal('hide');
            $('#nuevoModal').modal('show');
        });
        document.getElementById('continuaBtn').addEventListener('click', function() {
            $('#nuevoModal').modal('hide');
            $('#direccionModal').modal('show');
        });
        document.getElementById('continuarBtn').addEventListener('click', function() {
            $('#direccionModal').modal('hide');
            $('#ultimoModal').modal('show');
        });
        
    </script>