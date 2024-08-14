    <!-- Usuarios -->
    <div class="container mt-4">
        <h1 class="text-center">Usuarios Personal</h1>
                <!-- Añadir -->
                <div class="add-button-container">
                    <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#userModal">Añadir</button>
                </div>
                    <!-- Clientes -->
                    <div class="service-divider"></div>

    <?php
        require_once "./class/main.php";
        $main = new main();

        if(isset($_POST['modulo_buscador'])){
            require_once "./scripts/buscador.php";
        }

        if(!isset($_SESSION['busqueda_empleados']) && empty($_SESSION['busqueda_empleados'])){
    ?>
    <div class="columns">
        <div class="column">
            <form action="" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="empleados">   
                <div class="field is-grouped">
                    <p class="control is-expanded">
                        <input class="form-control" type="text" name="txt_buscador" placeholder="¿Qué estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30" >
                    </p>
                    <p class="control">
                        <button class="btn btn-custom" type="submit" >Buscar</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <?php }else{ ?>
    <div class="columns">
        <div class="column">
            <form class="has-text-centered mt-6 mb-6" action="" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="empleados"> 
                <input type="hidden" name="eliminar_buscador" value="empleados">
                <p>Estas buscando <strong>“<?php echo $_SESSION['busqueda_empleados']; ?>”</strong></p>
                <br>
                <button type="submit" class="btn btn-custom">Eliminar busqueda</button>
            </form>
        </div>
    </div>
    <?php
            $busqueda=$_SESSION['busqueda_empleados']; /* <== */

        }
        echo '    <div class="personal-container">';

            # Eliminar usuario #
            /*if(isset($_GET['user_id_del'])){
                require_once "./php/usuario_eliminar.php";
            }*/

            if(!isset($_GET['page'])){
                $pagina=1;
            }else{
                $pagina=(int) $_GET['page'];
                if($pagina<=1){
                    $pagina=1;
                }
            }

            $pagina=$main->limpiarstring($pagina);
            $url="index.php?vista=empleados&page="; /* <== */
            $registros=5;

            # Paginador usuario #
            require_once "./scripts/empleado_lista.php";
    ?>
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
                    <label class="form-label" for="compañia">Registro Federal de Contribuyentes (RFC):</label>
                    <input class="form-control" type="text" name="rfc">
                    <label class="form-label" for="cargo">Numero del Seguro Social:</label>
                    <input class="form-control" type="text" name="nss">
                    <label class="form-label" for="usuario">Usuario:</label>
                    <input class="form-control" type="text" name="usuario">
                    <label class="form-label" for="pass">Password:</label>
                    <input class="form-control" type="password" name="pass">
                    <div class="form-group">
                        <label class="form-label">Seleccione los roles:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="roles" id="gestorContenido">
                            <label class="form-check-label" for="gestorContenido">
                                Gestor de Contenido
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Gestor de Usuarios" name="roles[]" id="gestorRoles">
                            <label class="form-check-label" for="gestorRoles">
                                Gestor de Usuarios
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Gestor de Cotizaciones" name="roles[]" id="gestorCotizacion">
                            <label class="form-check-label" for="gestorCotizacion">
                                Gestor de Cotización
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Administrador" name="roles[]" id="administrador">
                            <label class="form-check-label" for="administrador">
                                Administrador
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-custom" id="guardarBtn">Guardar</button>
            </div>
            <?php
			if(isset($_POST['nombre']) && isset($_POST['apaterno']) && isset($_POST['amaterno']) && isset($_POST['tel'])
            && isset($_POST['correo']) && isset($_POST['usuario']) && isset($_POST['pass']) && isset($_POST['compañia'])
            && isset($_POST['cargo']) && isset($_POST['rfc']) && isset($_POST['nss']) && isset($_POST['roles'])){
				require_once "scripts/c_registro.php";
			}
		    ?>
        </div>
    </div>
</div>

<!-- Expandir -->
 <?php
include_once 'class/database.php';
$mostrar_usuario = new database($_SESSION['usuario']);
$consulta_datos_usuario=("SELECT * FROM vista_usuarios WHERE id_usuario='".$ver_id_cliente."' GROUP BY id_usuario");
$datos_usuario = $mostrar_usuario->seleccionar1($consulta_datos_usuario);
 ?>
<div class="modal fade" id="SeeMoreUser" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="userModalLabel"> <?php $datos_usuario->usuario ?> </h2>
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
                                            <td> <?php $datos_usuario->nombre ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Apellido Paterno:</th>
                                            <td> <?php $datos_usuario->a_p ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Apellido Materno:</th>
                                            <td> <?php $datos_usuario->a_m ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Telefono:</th>
                                            <td> <?php $datos_usuario->telefono ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Correo:</th>
                                            <td> <?php $datos_usuario->correo ?> </td>
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
                                            <form action="">
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
                                        </form>
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
                                            <td> <?php $datos_usuario->usuario ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Uso de la cuenta:</th>
                                            <td> <?php $datos_usuario->compañia ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Cargo de la compañía:</th>
                                            <td> <?php $datos_usuario->cargo ?> </td>
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