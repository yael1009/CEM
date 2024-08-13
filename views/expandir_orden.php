<div class="container">
        <div class="header-title">
            <h2>ID ORDEN 
            <?php 
            include_once 'class/main.php';
            include_once 'class/database.php';

            $main=new main();
            $conexion=new database($_SESSION['usuario']);

            //si quiero volver al action slo dejo la guardada de la variable y quito TODO el if
            if(!isset($_SESSION['id_solicitud'])){
            $id_solicitud=$main->limpiarstring($_POST['id_solicitud']);
             $_SESSION['id_solicitud']="$id_solicitud";
            }else{
                $id_solicitud=$main->limpiarstring($_SESSION['id_solicitud']);
            } 
            echo $id_solicitud;

            $consulta_datos=("SELECT * FROM VistaCompletaSolicitudes  WHERE id_solicitud='".$id_solicitud."' GROUP BY id_solicitud");
            $rows = $conexion->seleccionar1($consulta_datos);
            $consulta_usuario=("SELECT DISTINCT concat(nombre, ' ',a_p, ' ',a_m) AS nombre_completo,telefono FROM vista_usuarios ");
            $rows_usuario = $conexion->seleccionar1($consulta_usuario);

            if($rows->estado_orden !== NULL){
                $aceptada = true;
            }

            if(/*isset($id_solicitud) || */$rows->estado_solicitud !== 'Cancelado'){
                $conexion->ejecutar("UPDATE SOLICITUDES SET estado = 'Visto' WHERE id_solicitud = $id_solicitud");
            }
            ?>
            </h2>
        </div>

        <div class="order-info row">
            <div class="col-md-8">
                <?php echo 
                '<h6>Cliente</h6>
                <p>Usuario: '.$rows->usuario.'<br>
                    Nombre completo: '.$rows_usuario->nombre_completo.'<br>
                    Teléfono: '.$rows_usuario->telefono.'</p>';
                ?>
            </div>
            <div class="col-md-4 text-center">
                <div class="profile-img-table">
                    <img src="img/foto_perfil_clientes.jpg" alt="Foto de perfil" class="img-fluid rounded-circle">
                </div>
            </div>
        </div>

        <?php
        $query="SELECT DISTINCT tipo_servicio FROM VistaCompletaSolicitudes  WHERE id_solicitud='".$rows->id_solicitud."' ORDER BY fecha_solicitud";
            $solicitudes = $conexion->seleccionar($query);
            $query_archivo="SELECT DISTINCT archivo_ruta FROM VistaCompletaSolicitudes  WHERE id_solicitud='".$rows->id_solicitud."' ORDER BY fecha_solicitud";
            $archivos = $conexion->seleccionar($query_archivo);
            $tabla="";
			$tabla.='
        <table class="table">
            <tbody>
                <tr>
                    <th class="section-title">Trabajo solicitado el día</th>
                    <td>'.$rows->fecha_solicitud.'</td>
                </tr>
                <tr>
                    <th class="section-title">Fecha de entrega óptima</th>
                    <td>'.$rows->fecha_esperada.'</td>
                </tr>
                <tr>
                    <th class="section-title">Dirección</th>
                    <td>'.$rows->direccion_completa.'</td>
                </tr>
                <tr>
                    <th class="section-title">Referencia</th>
                    <td>'.$rows->referencia.'</td>
                </tr>
                <tr>
                    <th class="section-title">Tipo de trabajo</th>
                    <td>'.$rows->tipo_trabajo.'</td>
                </tr>
                <tr>
                    <th class="section-title">Servicios</th>
                    <td>';
                    foreach ($solicitudes as $rows2) {
                        $query2="SELECT DISTINCT servicio, id_ss FROM VistaCompletaSolicitudes  WHERE tipo_servicio='".$rows2->tipo_servicio."' AND id_solicitud='".$rows->id_solicitud."'";
                        $servicios = $conexion->seleccionar($query2);

                        $tabla .= "<strong>".$rows2->tipo_servicio."</strong> <br>";
                        foreach ($servicios as $rows3) {
                            $tabla .= "<br>" . $rows3->servicio . "  " . $rows3->id_ss;
                            
                            if($aceptada){
                            $tabla .='
                            <form action="" method="POST" autocomplete="off" >
                            <input type="hidden" name="id_ss" value="'.$rows3->id_ss.'">   
                                <button class="btn btn-custom mx-1" type="submit" >Ver catalogo</button>
                            </form>';
                            }
                        }
                        }          
                    $tabla .= '</td>
                </tr>
                <tr>
                    <th class="section-title">Estado</th>
                    <td>';
                    if ($aceptada) {
                        $tabla .= $rows->estado_orden;
                    }
                    else{
                        $tabla .= $rows->estado_solicitud;
                    }
                    $tabla.='</td>
                </tr>';
                if($aceptada){
                $tabla.='
                <tr>
                    <th class="section-title">Levantamiento</th>
                    <td>';
                    if($rows->id_levantamiento !== NULL ){
                    $tabla.='
                    <form action="" method="POST" autocomplete="off" >
                    <input type="hidden" name="id_levantamiento" value="'.$rows->id_levantamiento.'">   
                        <button class="btn btn-custom btn-sm" type="submit" >
                        Ver levantamiento
                        </button>
                    </form>';
                    }else{
                    $tabla.='<button class="btn btn-custom btn-sm" data-toggle="modal" data-target="#LevantamientoModalVoltaje">Crear Levantamiento</button>';
                    }
                    $tabla.='</td>
                </tr>';
                }
                $tabla.='
                <tr>
                    <th class="section-title">Archivos enviados</th>
                    <td>';
                    foreach($archivos as $rows2){
                        $tabla.=$rows2->archivo_ruta . "<br>";
                    }
                    $tabla .= '</td>
                </tr>
                <tr>
                    <th class="section-title">Comentarios del cliente</th>
                    <td>'.$rows->comentarios.'</td>
                </tr>';
                if ($aceptada){
                    $tabla.='
                    <tr>
                        <th class="section-title">Subtotal</th>
                        <td>'.$rows->subtotal.'</td>
                    </tr>
                    <tr>
                        <th class="section-title">IVA</th>
                        <td>'.$rows->iva.'</td>
                    </tr>
                    <tr>
                        <th class="section-title">Total</th>
                        <td>'.$rows->total.'</td>
                    </tr>';
                }
            $tabla .='</tbody>
        </table>';
        
        if($rows->estado_orden !== "Completado" && $rows->estado_orden !== "Descartado" && $rows->estado_solicitud !== "Cancelado"){
            $tabla .='
            <div class="actions text-center">
            <form action="" method="POST" autocomplete="off" >
            <input type="hidden" name="accion" value="cancelar">   
                    <button class="btn btn-custom" type="submit" >Cancelar orden</button>
            </form>
            <br>';
        }
        
        if(!isset($aceptada) && $rows->estado_solicitud !== "Cancelado"){
            $tabla .='
            <form action="" method="POST" autocomplete="off" >
            <input type="hidden" name="accion" value="aceptar">   
                    <button class="btn btn-custom mx-1" type="submit" >Aceptar orden</button>
            </form>
            <br>';
        }
        
        if(isset($aceptada) && $rows->estado_orden !== "Descartado" && $rows->estado_orden !== "Completado"){
            $tabla .='
            <form action="" method="POST" autocomplete="off" >
            <input type="hidden" name="accion" value="completado">   
                    <button class="btn btn-custom mx-1" type="submit" >Terminar trabajo</button>
            </form>
            <br>';
        }
            include "inc/regresar.php";
            $tabla .='            
            <button class="btn btn-custom mx-1"> <a href="index.php?vista=ordenes_solicitudes">Regresar</a></button>
        </div>
    </div>';
    echo $tabla;

    if(isset($_POST['accion'])){
        $recargar='index.php?vista=expandir_orden';
        include 'scripts/estado.php';
    }

    if(isset($_POST['id_ss'])){
        $id_ss = $main->limpiarstring($_POST['id_ss']);
        $_SESSION['id_ss'] = $id_ss;
        header("Location: index.php?vista=catalogo_editar");
        exit;			
    }

    if(isset($_POST['id_levantamiento'])){
        $id_levantamiento = $main->limpiarstring($_POST['id_levantamiento']);
        $_SESSION['id_levantamiento'] = $id_levantamiento;
        header("Location: index.php?vista=ver_levantamiento");
        exit;			
    }
    ?>
    
    <!-- Modal de Creacion de Levantamiento Escoger el Voltaje-->
    <div class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Estado</h5>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="">
                            <label class="form-label" for="estado">Editar Estado</label><br>
                            <select class="form-select same" aria-label="Default select example">
                            <option selected>En Progreso</option>
                            <option value="2">Completado</option>
                            <option value="3">Descartado</option>
                            </select>
                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" id="updateBtnEstadoOrden">Cambiar Estado</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de Creacion de Levantamiento Escoger el Voltaje-->
    <div class="modal fade" id="LevantamientoModalVoltaje" tabindex="-1" role="dialog" aria-labelledby="levantamientoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="levantamientoModalLabel">Creacion de Levantamiento</h5>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="">
                            <label class="form-label" for="tip_serv">Tipo de Voltaje</label>
                            <!-- Grupo de Radio Buttons -->
                            <div class="radio-group">
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="tipo_trabajo" id="domestico" value="Domestico">
                                <label class="form-check-label" for="domestico">127 V</label>
                            </div>
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="tipo_trabajo" id="industrial" value="Industrial">
                                <label class="form-check-label" for="industrial">220 V</label>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" id="guardarBtnCreacionVoltaje">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
