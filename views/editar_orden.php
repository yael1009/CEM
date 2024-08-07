<div class="container">
        <div class="header-title">
            <h2>ID_ORDEN</h2>
        </div>

        <div class="order-info row">
            <div class="col-md-8">
                <h6>Cliente</h6>
                <p>Usuario: jorgito_uwu<br>
                    Nombre completo: Jorge Fabela uwu<br>
                    Teléfono: 871 666 6969</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="profile-img-table">
                    <img src="../img/foto_perfil_clientes.jpg" alt="Foto de perfil" class="img-fluid rounded-circle">
                </div>
            </div>
        </div>
        <form action="">
            <table class="table">
                <tbody>
                    <tr>
                        <th class="section-title">Trabajo solicitado el día</th>
                        <td>Trabajo solicitado el día</td>
                    </tr>
                    <tr>
                        <th class="section-title">Fecha de entrega óptima</th>
                        <td><input class="form-control" type="date" name="detalle"></td>
                    </tr>
                    <tr>
                        <th class="section-title" colspan="2">Dirección</th>
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
                        <th class="section-title">Tipo de trabajo</th>
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
                        <th class="section-title">Estado</th>
                        <td><select class="form-select same" aria-label="Default select example">
                            <option selected>En Progreso</option>
                            <option value="2">Completado</option>
                            <option value="3">Descartado</option>
                            </select></td>
                    </tr>
                    <tr>
                        <th class="section-title">Archivos enviados</th>
                        <td>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_serv" name="img_serv">
                                <label class="custom-file-label" for="img_serv">Seleccionar archivo</label>
                            </div>
                            <br><br><button type="button" class="btn btn-custom">Agregar Otro Archivo</button><br>
                        </td>
                    </tr>
                    <tr>
                        <th class="section-title">Comentarios del cliente</th>
                        <td><textarea class="form-control" name="comentarios" rows="3" pattern="[a-zA-Z0-9$@.-]{7,2000}" maxlength="2000"></textarea></td>
                    </tr>
                </tbody>
            </table>

        </form>

        <div class="actions text-center">
            <button class="btn btn-custom mx-1"><a href="ordenes_expandir.html">Cancelar Edicion</a></button>
            <button class="btn btn-custom mx-1">Guardar</button>
        </div>
    </div>
    <!-- Modal de Levantamiento -->
    <div class="modal fade" id="levantamientoModal" tabindex="-1" role="dialog" aria-labelledby="levantamientoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="levantamientoModalLabel">Levantamiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Aparatos</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Aparato #1</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Aparato #2</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Aparato #3</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Aparato #4</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Aparato #5</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select class="form-select same" aria-label="Default select example">
                                        <option selected>Agregar Aparato</option>
                                        <option value="2">MiniSplit</option>
                                        <option value="3">Ventilador</option>
                                        <option value="2">Foquito</option>
                                        <option value="2">Focote</option>
                                        <option value="2">Focototote</option>
                                        <option value="2">Foquititito</option>
                                        </select>
                                    <button class="btn btn-secondary same">Gestionar Aparatos</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <form action="">
                            <label class="form-label" for="tip_serv">Tipo de Voltaje</label>
                            <!-- Grupo de Radio Buttons -->
                            <div class="radio-red">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="radioCliente" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="radioCliente">127 V</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="radioGestorContenido" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="radioGestorContenido">220 V</label>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>