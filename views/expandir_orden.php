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

        <table class="table">
            <tbody>
                <tr>
                    <th class="section-title">Trabajo solicitado el día</th>
                    <td>Trabajo solicitado el día</td>
                </tr>
                <tr>
                    <th class="section-title">Fecha de entrega óptima</th>
                    <td>Fecha de entrega óptima</td>
                </tr>
                <tr>
                    <th class="section-title" colspan="2">Dirección</th>
                </tr>
                <tr>
                    <th class="section-title">Calle</th>
                    <th class="section-title">Colonia</th>
                </tr>
                <tr class="tablee">
                    <td class="tablee">
                        Calle
                    </td>
                    <td class="tablee">
                        Colonia
                    </td>
                </tr>
                <tr class="tablee">
                    <td class="tablee">
                        Numero Exterior
                    </td>
                    <td class="tablee">
                        Numero Interior
                    </td>
                </tr>
                <tr class="tablee">
                    <td class="tablee">
                        Ciudad
                    </td>
                    <td class="tablee">
                        Estado
                    </td>
                </tr>
                <tr class="tablee">
                    <td class="tablee">
                        Codigo Postal
                    </td>
                    <td class="tablee">
                        Referencia
                    </td>
                </tr>
                <tr>
                    <th class="section-title">Tipo de trabajo</th>
                    <td>Tipo de trabajo</td>
                </tr>
                <tr>
                    <th class="section-title">Estado</th>
                    <td>Estado</td>
                </tr>
                <tr>
                    <th class="section-title">Levantamiento</th>
                    <td><button class="btn btn-custom btn-sm">Ver Levantamiento</button>
                        <button class="btn btn-custom btn-sm" data-toggle="modal" data-target="#LevantamientoModalVoltaje">Crear Levantamiento</button></td>
                </tr>
                <tr>
                    <th class="section-title">Archivos enviados</th>
                    <td>Archivo<br>Archivo<br>Archivo</td>
                </tr>
                <tr>
                    <th class="section-title">Comentarios del cliente</th>
                    <td>Comentarios del cliente</td>
                </tr>
            </tbody>
        </table>

        <div class="actions text-center">
            <button class="btn btn-custom mx-1">Cancelar orden</button>
            <button class="btn btn-custom mx-1"><a href="ordenes_catalogo.html">Ver Catálogo</a></button>
            <button class="btn btn-custom mx-1"><a href="ordenes_expandir_editar.html">Editar</a></button>
            <button class="btn btn-custom mx-1"> <a href="ordenes_ordenes.html">Regresar</a></button>
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
    <!-- Modal de Creacion de Levantamiento Escoger los Aparatos-->
    <div class="modal fade" id="LevantamientoModalAparatos" tabindex="-1" role="dialog" aria-labelledby="levantamientoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="levantamientoModalLabel">Levantamiento</h5>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Aparatos</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Aparato #1</td>
                                <td>2</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Aparato #2</td>
                                <td>5</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Aparato #3</td>
                                <td>2</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Aparato #4</td>
                                <td>3</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Aparato #5</td>
                                <td>1</td>
                                <td class="text-right"><button class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-select same" aria-label="Default select example">
                                        <option selected>Agregar Aparato</option>
                                        <option value="2">MiniSplit</option>
                                        <option value="3">Ventilador</option>
                                        <option value="2">Foquito</option>
                                        <option value="2">Focote</option>
                                        <option value="2">Focototote</option>
                                        <option value="2">Foquititito</option>
                                        </select>
                                </td>
                                <td>
                                <label class="form-label" for="concepto">Cantidad:</label>
                                <input class="form-control" type="text" name="N_aparatos" pattern="[0-9]+" maxlength="10" required>
                                </td>
                                <td>
                                    <button class="btn btn-custom">Agregar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-secondary same">Gestionar Aparatos</button>

                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" id="btnCreaLevantamiento">Crear</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('guardarBtnCreacionVoltaje').addEventListener('click', function() {
            $('#LevantamientoModalVoltaje').modal('hide');
            $('#LevantamientoModalAparatos').modal('show');
        });
    </script> 