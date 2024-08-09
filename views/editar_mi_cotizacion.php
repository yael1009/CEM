
<!--Formulario-->
<div class="container d-flex flex-column align-items-center">
        <h1 class="mt-4">Editar Mi Cotizacion</h1>
        <div class="container-custom mt-4">
            <div class="table-custom">
                <div class="table-header p-2">
                    Numero de Orden
                </div>
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
                    <div class="button-container">
                        <button type="button" class="btn btn-custom"><a href="index.php?vista=mis_cotizaciones">Cancelar Edicion</a></button>
                        <button type="submit" class="btn btn-custom">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Postar datos -->
