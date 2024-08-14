<!-- catalogo -->

<div class="container mt-4">
        <h1 class="text-center">Ver Levantamiento ID_ORDEN</h1>
        <div class="service-divider"></div>
        <div class="text-right mb-3">
            <button class="btn btn-custom"><a href="index.php?vista=ordenes_en_progreso">Cancelar Edicion</a></button>
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#conceptModal">Añadir Aparato</button>
            <button class="btn btn-custom">Guardar</button>
        </div>

        <?php
            include 'scripts/select_levantamiento.php';
        ?>
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
                        <?php
                        include 'scripts/select_aparatos.php';
                        ?>
                        </select>
                    <button class="btn btn-secondary same">Gestionar Aparatos</button><br>
                    <label class="form-label" for="concepto">Cantidad:</label>
                    <input class="form-control" type="text" name="N_aparatos" pattern="[0-9]+" maxlength="10" required><br>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-custom" id="agregarBtn">Guardar</button>
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
                        <?php
                        include 'scripts/select_aparatos.php';
                        ?>
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