<!-- catalogo -->

<div class="container mt-4">
        <h1 class="text-center">Catálogo</h1>
        <div class="text-right mb-3">
            <button class="btn btn-custom"><a href="ordenes_catalogo.html">Cancelar Edicion</a></button>
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#conceptModal">Añadir Concepto</button>
            <button class="btn btn-custom">Guardar</button>
        </div>
        
        <div class="service-divider"></div>
        <?php
            include 'scripts/select_catalogo.php';
            ?>
        <!-- <div class="table-responsive">
            <table class="table tabla table-bordered">
                <thead>
                    <tr class="thBlanco">
                        <th>Concepto</th>
                        <th>Insumo</th>
                        <th>Unidad</th>
                        <th>Cant.</th>
                        <th>Unitario</th>
                        <th>Importe</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Suministro e instalación de acometida eléctrica</td>
                        <td>Cable de cobre</td>
                        <td>Pza</td>
                        <td>2</td>
                        <td>$5,500.00</td>
                        <td>$11,000.00</td>
                        <td>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#editconceptModal">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Suministro e instalación de interruptor termomagnético principal con gabinete</td>
                        <td>Interruptor Automatico</td>
                        <td>Pza</td>
                        <td>2</td>
                        <td>$8,800.00</td>
                        <td>$17,600.00</td>
                        <td>
                            <button class="btn btn-custom">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Suministro e instalación de tablero centro de carga para 12 circuitos, incluye interruptores</td>
                        <td>Toma Corriente</td>
                        <td>Pza</td>
                        <td>2</td>
                        <td>$8,800.00</td>
                        <td>$17,600.00</td>
                        <td>
                            <button class="btn btn-custom">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Instalación de salidas para alumbrado interior, incluye canalización y cableado</td>
                        <td>Caja de conecciones</td>
                        <td>Salida</td>
                        <td>12</td>
                        <td>$8,800.00</td>
                        <td>$17,600.00</td>
                        <td>
                            <button class="btn btn-custom">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Suministro e instalación de luminaria LED tipo campana industrial UFO 100W</td>
                        <td>Placa Solar</td>
                        <td>Pza</td>
                        <td>12</td>
                        <td>$8,800.00</td>
                        <td>$17,600.00</td>
                        <td>
                            <button class="btn btn-custom">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Instalación de salidas para alumbrado exterior, incluye canalización y cableado</td>
                        <td>Fusible</td>
                        <td>Salida</td>
                        <td>9</td>
                        <td>$8,800.00</td>
                        <td>$17,600.00</td>
                        <td>
                            <button class="btn btn-custom">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-custom">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Suministro e instalación de reflector LED 100W para exterior</td>
                        <td>Bateria de respaldo</td>
                        <td>Pza</td>
                        <td>9</td>
                        <td>$8,800.00</td>
                        <td>$17,600.00</td>
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
        <div class="service-divider"></div>
            <table class="table">
                <tbody>
                    <tr class="total-row">
                        <td class="text-right">Total</td>
                        <td class="text-right">$131,138.00</td>
                    </tr>
                </tbody>
            </table>-->
    </div>
    </div>
    <!-- Añadir -->
<div class="modal fade" id="conceptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Concepto</h1>
            </div>
            <div class="modal-body">
                <form action="" autocomplete="off">
                    <input type="hidden" id="id_concepto_edit" name="id_concepto">
                    <label class="form-label" for="concepto_a">Concepto:</label>
                    <input class="form-control" type="text" name="concepto_a" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,1000}" maxlength="1000" required><br>
                    <select class="form-select" aria-label="Default select example" name="insumo_a">
                        <option selected>Insumo Usado</option>
                        <option value="1">Cable Cobre</option>
                        <option value="2">Interruptor Automatico</option>
                        <option value="3">Toma Corriente</option>
                        <option value="4">Caja de Conecciones</option>
                        <option value="5">Placa Solar</option>
                        <option value="6">Conector MC4</option>
                        <option value="7">Sensor de Luz</option>
                        <option value="8">Fusible</option>
                        <option value="9">Rele de Proteccion</option>
                    </select><br><br>
                    
                    <label class="form-label" for="cantidad_a">Cantidad:</label>
                    <input class="form-control" type="text" name="cantidad_a" pattern="[0-9]+" maxlength="10" required>
                    <label class="form-label" for="unitario">Unitario:</label>
                    <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="unitario_a" pattern="[0-9]+" maxlength="10" required>
                    <span class="input-group-text">.00</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-custom" id="guardarBtn">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Editar -->
<div class="modal fade" id="editconceptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Concepto</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="scripts/editar_concepto_catalogo.php" autocomplete="off">
                    <input type="hidden" id="id_concepto_edit" name="id_concepto">

                    <label class="form-label" for="concepto">Concepto:</label>
                    <input class="form-control" type="text" name="concepto" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,1000}" maxlength="1000"><br>

                    <select class="form-select" aria-label="Default select example" name="insumo">
                    <option selected>Insumo Usado</option>
                        <option value="1">Cable Cobre</option>
                        <option value="2">Interruptor Automatico</option>
                        <option value="3">Toma Corriente</option>
                        <option value="4">Caja de Conecciones</option>
                        <option value="5">Placa Solar</option>
                        <option value="6">Conector MC4</option>
                        <option value="7">Sensor de Luz</option>
                        <option value="8">Fusible</option>
                        <option value="9">Rele de Proteccion</option>                    </select><br><br>

                    <label class="form-label" for="cantidad">Cantidad:</label>
                    <input class="form-control" type="text" name="cantidad" pattern="[0-9]+" maxlength="10" >
                    <label class="form-label" for="unitario">Unitario:</label>
                    <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="unitario" pattern="[0-9]+" maxlength="10" >
                    <span class="input-group-text">.00</span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-custom">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
