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
