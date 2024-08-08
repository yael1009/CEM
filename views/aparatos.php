<!-- Aparatos -->
<div class="container mt-4">
        <h1 class="text-center">Aparatos</h1>
        <div class="text-right">
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#appliancesModal">Añadir</button>
        </div>
        <div class="service-divider"></div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr class="thBlanco">
                    <th>Nombre completo del Aparato</th>
                    <th>Potencia nominal</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lampara de bajo consumo y tubos fluorescentes 9W</td>
                    <td>9</td>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#editappliancesModal" class="btn btn-primary btn-sm">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Lampara de bajo consumo y tubos fluorescentes 11W</td>
                    <td>11</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Lampara de bajo consumo y tubos fluorescentes 15W</td>
                    <td>15</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Lampara de bajo consumo y tubos fluorescentes 20W</td>
                    <td>20</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Lamparas incandescentes 25W</td>
                    <td>25</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Lamparas incandescentes 40W</td>
                    <td>40</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Lamparas incandescentes 60W</td>
                    <td>60</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Lamparas incandescentes 75W</td>
                    <td>75</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Añadir -->
<div class="modal fade" id="appliancesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Aparato</h1>
            </div>
            <div class="modal-body">
                <form action="" autocomplete="off">
                    <label class="form-label" for="nombre">Nombre Completo del Aparato:</label>
                    <input class="form-control" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100" required>
                    <label class="form-label" for="apaterno">Potencia Nominal:</label>
                    <input class="form-control" type="text" name="potencia_nominal" pattern="[0-9]+" maxlength="10" required>
                    
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
<div class="modal fade" id="editappliancesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Aparato</h1>
            </div>
            <div class="modal-body">
                <form action="" autocomplete="off">
                    <label class="form-label" for="nombre">Nombre Completo del Aparato:</label>
                    <input class="form-control" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="100" required>
                    <label class="form-label" for="apaterno">Potencia Nominal:</label>
                    <input class="form-control" type="text" name="potencia_nominal" pattern="[0-9]+" maxlength="10" required>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-custom" id="guardarBtn">Guardar</button>
            </div>
        </div>
    </div>
</div>