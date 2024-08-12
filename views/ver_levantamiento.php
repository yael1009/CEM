<!-- catalogo -->

<div class="container mt-4">
        <h1 class="text-center">Ver Levantamiento ID_ORDEN</h1>
        <div class="service-divider"></div>
        <div class="text-right mb-3">
            <button class="btn btn-custom"><a href="index.php?vista=ordenes_en_progreso">Cancelar Edicion</a></button>
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#conceptModal">Añadir Aparato</button>
            <button class="btn btn-custom">Guardar</button>
        </div>
        <table class="table">
            <tbody>
                <tr class="total-row">
                    <th class="section-title text-right">Voltaje del Circuito</th>
                    <td class="text-right">Voltaje Insertado</td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr class="total-row">
                    <th class="text-right">Resultado:</th>
                    <td class="text-right">######</td>
                </tr>
            </tbody>
        </table>
        <div class="service-divider"></div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Aparato</th>
                        <th>Volts c/u</th>
                        <th>Cantidad</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Aparato 1</td>
                        <td>300</td>
                        <td>2</td>
                        <td>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#editconceptModal">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Aparato 2</td>
                        <td>500</td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-custom">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Aparato 3</td>
                        <td>40</td>
                        <td>4</td>
                        <td>
                            <button class="btn btn-custom">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Aparato 4</td>
                        <td>50</td>
                        <td>2</td>
                        <td>
                            <button class="btn btn-custom">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Aparato 5</td>
                        <td>80</td>
                        <td>3</td>
                        <td>
                            <button class="btn btn-custom">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Añadir -->
<div class="modal fade" id="conceptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Aparato</h1>
            </div>
            <div class="modal-body">
                <form action="" autocomplete="off">
                    <select class="form-select same" aria-label="Default select example">
                        <option selected>Agregar Aparato</option>
                        <option value="2">MiniSplit</option>
                        <option value="3">Ventilador</option>
                        <option value="2">Foquito</option>
                        <option value="2">Focote</option>
                        <option value="2">Focototote</option>
                        <option value="2">Foquititito</option>
                        </select>
                    <button class="btn btn-secondary same">Gestionar Aparatos</button><br>
                    <label class="form-label" for="concepto">Cantidad:</label>
                    <input class="form-control" type="text" name="N_aparatos" pattern="[0-9]+" maxlength="10" required><br>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-custom" id="agregarBtn">Agregar</button>
            </div>
        </div>
    </div>
</div>

<!-- Editar -->
<div class="modal fade" id="editconceptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Aparato</h1>
            </div>
            <div class="modal-body">
                <form action="" autocomplete="off">
                    <select class="form-select same" aria-label="Default select example">
                        <option selected>Agregar Aparato</option>
                        <option value="2">MiniSplit</option>
                        <option value="3">Ventilador</option>
                        <option value="2">Foquito</option>
                        <option value="2">Focote</option>
                        <option value="2">Focototote</option>
                        <option value="2">Foquititito</option>
                        </select>
                    <button class="btn btn-secondary same">Gestionar Aparatos</button><br>
                    <label class="form-label" for="concepto">Cantidad:</label>
                    <input class="form-control" type="text" name="N_aparatos" pattern="[0-9]+" maxlength="10" required><br>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-custom" id="guardarBtn">Guardar</button>
            </div>
        </div>
    </div>
</div>