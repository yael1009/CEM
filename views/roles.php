    <!-- Usuarios -->
    <div class="container mt-4">
        <h1 class="text-center">Usuarios</h1>
        <!-- Añadir -->
        <div class="add-button-container">
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#userModal">Añadir</button>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="clientes-tab" data-toggle="tab" href="#clientes" role="tab" aria-controls="clientes" aria-selected="true">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Personal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="proveedores-tab" data-toggle="tab" href="#proveedores" role="tab" aria-controls="proveedores" aria-selected="false">Proveedores</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- Clientes -->
             <?php
             include "tabs/user_list.php"; 
             ?>
            <!-- Personal -->
            <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                <br>
                <div class="personal-container">
                    <div class="personal-card">
                        <div class="step">
                            <div class="details">
                                <img src="../img/foto_perfil_personal.jpg" alt="Foto de perfil" class="profile-img-cuad">
                                <p>Nombressss</p>
                                <p>Apellidosssss</p>
                                <p>Rol</p>
                                <p><a href="#" class="text-danger">expandir</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="personal-card">
                        <div class="step">
                            <div class="details">
                                <img src="../img/foto_perfil_personal.jpg" alt="Foto de perfil" class="profile-img-cuad">
                                <p>Nombressss</p>
                                <p>Apellidosssss</p>
                                <p>Rol</p>
                                <p><a href="#" class="text-danger">expandir</a></p>
                            </div>

                        </div>
                    </div>
                    <div class="personal-card">
                        <div class="step">
                            <div class="details">
                                <img src="../img/foto_perfil_personal.jpg" alt="Foto de perfil" class="profile-img-cuad">
                                <p>Nombressss</p>
                                <p>Apellidosssss</p>
                                <p>Rol</p>
                                <p><a href="#" class="text-danger">expandir</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="personal-card">
                        <div class="step">
                            <div class="details">
                                <img src="../img/foto_perfil_personal.jpg" alt="Foto de perfil" class="profile-img-cuad">
                                <p>Nombressss</p>
                                <p>Apellidosssss</p>
                                <p>Rol</p>
                                <p><a href="#" class="text-danger">expandir</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="personal-card">
                        <div class="step">
                            <div class="details">
                                <img src="../img/foto_perfil_personal.jpg" alt="Foto de perfil" class="profile-img-cuad">
                                <p>Nombressss</p>
                                <p>Apellidosssss</p>
                                <p>Rol</p>
                                <p><a href="#" class="text-danger">expandir</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Proveedres -->
            <div class="tab-pane fade" id="proveedores" role="tabpanel" aria-labelledby="proveedores-tab">
                <br>
                <div class="personal-container">
                    <div class="personal-card">
                        <div class="step">
                            <div class="details">
                                <img src="../img/foto_perfil_proveedores.jpg" alt="Foto de perfil" class="profile-img-cuad">
                                <p>Nombressss</p>
                                <p>Apellidosssss</p>
                                <p>Rol</p>
                                <p><a href="#" class="text-danger">expandir</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="personal-card">
                        <div class="step">
                            <div class="details">
                                <img src="../img/foto_perfil_proveedores.jpg" alt="Foto de perfil" class="profile-img-cuad">
                                <p>Nombressss</p>
                                <p>Apellidosssss</p>
                                <p>Rol</p>
                                <p><a href="#" class="text-danger">expandir</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="personal-card">
                        <div class="step">
                            <div class="details">
                                <img src="../img/foto_perfil_proveedores.jpg" alt="Foto de perfil" class="profile-img-cuad">
                                <p>Nombressss</p>
                                <p>Apellidosssss</p>
                                <p>Rol</p>
                                <p><a href="#" class="text-danger">expandir</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="personal-card">
                        <div class="step">
                            <div class="details">
                                <img src="../img/foto_perfil_proveedores.jpg" alt="Foto de perfil" class="profile-img-cuad">
                                <p>Nombressss</p>
                                <p>Apellidosssss</p>
                                <p>Rol</p>
                                <p><a href="#" class="text-danger">expandir</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Añadir -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Usuario</h1>
            </div>
            <div class="modal-body">
                <form action="">
                    <label class="form-label" for="nombre">Nombres</label>
                    <input class="form-control" type="text" name="nombre">
                    <label class="form-label" for="apaterno">Apellido Paterno</label>
                    <input class="form-control" type="text" name="apaterno">
                    <label class="form-label" for="amaterno">Apellido Materno</label>
                    <input class="form-control" type="text" name="amaterno">
                    <label class="form-label" for="tel">Telefono</label>
                    <input class="form-control" type="text" name="tel">
                    <label class="form-label" for="correo">Correo:</label>
                    <input class="form-control" type="email" name="correo">
                    <label class="form-label" for="usuario">Usuario:</label>
                    <input class="form-control" type="text" name="usuario">
                    <label class="form-label" for="pass">Password:</label>
                    <input class="form-control" type="password" name="pass">
                    <label class="form-label" for="compañia">Uso de la Cuenta</label>
                    <input class="form-control" type="text" name="compañia" placeholder="Personal/Compañia">
                    <label class="form-label" for="cargo">Cargo en la Compañia</label>
                    <input class="form-control" type="text" name="cargo" placeholder="Personal/Propietario/Gerente/Constructor">
                    <div class="form-group">
                        <label class="form-label">Seleccione los roles:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="cliente">
                            <label class="form-check-label" for="cliente">
                                Cliente
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="gestorContenido">
                            <label class="form-check-label" for="gestorContenido">
                                Gestor de Contenido
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="gestorRoles">
                            <label class="form-check-label" for="gestorRoles">
                                Gestor de Roles
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="gestorCotizacion">
                            <label class="form-check-label" for="gestorCotizacion">
                                Gestor de Cotización
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="administrador">
                            <label class="form-check-label" for="administrador">
                                Administrador
                            </label>
                        </div>
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

<!-- Expandir -->
<div class="modal fade" id="SeeMoreUser" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="userModalLabel">Nombre Usuario</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row centerr">
                    <img src="../img/foto_perfil_clientes.jpg" width="30%" alt="Imagen">
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-custom">
                                <div class="table-header p-2">
                                    Datos Personales
                                </div>
                                <table class="table mb-0" >
                                    <tbody>
                                        <tr>
                                            <th>Nombres:</th>
                                            <td>Jorge</td>
                                        </tr>
                                        <tr>
                                            <th>Apellido Paterno:</th>
                                            <td>Fabela</td>
                                        </tr>
                                        <tr>
                                            <th>Apellido Materno:</th>
                                            <td>No se</td>
                                        </tr>
                                        <tr>
                                            <th>Telefono:</th>
                                            <td>871 666 6969</td>
                                        </tr>
                                        <tr>
                                            <th>Correo:</th>
                                            <td>jorgito_uwu@gmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="table-custom">
                                    <div class="table-header p-2">
                                        Seleccione los roles
                                    </div>
                                    <table class="table mb-0" >
                                        <tbody>
                                        <div class="form-check">
                                            <tr>
                                                <th></th>
                                                <td><input class="form-check-input" type="checkbox" value="" id="cliente">
                                                    <label class="form-check-label" for="cliente">
                                                    Cliente
                                                </label></td>
                                            </tr>
                                        </div>
                                        <div class="form-check">
                                            <tr>
                                                <th></th>
                                                <td><input class="form-check-input" type="checkbox" value="" id="gestorContenido">
                                                    <label class="form-check-label" for="gestorContenido">
                                                    Gestor de Contenido
                                                </label></td>
                                            </tr>
                                        </div>
                                        <div class="form-check">
                                            <tr>
                                                <th></th>
                                                <td><input class="form-check-input" type="checkbox" value="" id="gestorRoles">
                                                    <label class="form-check-label" for="gestorRoles">
                                                    Gestor de Roles
                                                </label></td>
                                            </tr>
                                        </div>
                                        <div class="form-check">
                                            <tr>
                                                <th></th>
                                                <td><input class="form-check-input" type="checkbox" value="" id="gestorCotizacion">
                                                    <label class="form-check-label" for="gestorCotizacion">
                                                    Gestor de Cotización
                                                </label></td>
                                            </tr>
                                        </div>
                                        <div class="form-check">
                                            <tr>
                                                <th></th>
                                                <td><input class="form-check-input" type="checkbox" value="" id="administrador">
                                                    <label class="form-check-label" for="administrador">
                                                    Administrador
                                                </label></td>
                                            </tr>
                                        </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-custom">
                                <div class="table-header p-2">
                                    Datos de Usuario
                                </div>
                                <table class="table mb-0" >
                                    <tbody>
                                        <tr>
                                            <th>Usuario:</th>
                                            <td>jorgito_uwu</td>
                                        </tr>
                                        <tr>
                                            <th>Contraseña:</th>
                                            <td>*************</td>
                                        </tr>
                                        <tr>
                                            <th>Uso de la cuenta:</th>
                                            <td>Personal</td>
                                        </tr>
                                        <tr>
                                            <th>Cargo de la compañía:</th>
                                            <td>Propietario</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-info">Editar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div> 
    </div>
</div>    
