    <!--Servicios-->
<div class="container d-flex flex-column align-items-center">
        <h1 class="mt-4">Servicios</h1>
        <div class="container-custom">
            <div class="add-button-container">
                <button type="button" class="btn btn-custom"><a href="../gestor_contenido/contenido_contenido.html">Regresar</a></button>
                <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#serviceModalAdd">Añadir</button>
            </div>
            <div class="section-title">
                <h2>Visibles</h2>
            </div>
            <div class="service-container">
                <img src="https://via.placeholder.com/70" alt="Imagen">
                <h5>Titulo del servicio</h5>
                <a href="#" class="expand-link" data-toggle="modal" data-target="#seeMoreService">expandir</a>
            </div>
            <div class="service-container">
                <img src="https://via.placeholder.com/70" alt="Imagen">
                <h5>Titulo del servicio</h5>
                <a href="#" class="expand-link" data-toggle="modal" data-target="#seeMoreService">expandir</a>
            </div>
            <div class="service-container">
                <img src="https://via.placeholder.com/70" alt="Imagen">
                <h5>Titulo del servicio</h5>
                <a href="#" class="expand-link" data-toggle="modal" data-target="#seeMoreService">expandir</a>
            </div>
            <div class="service-container">
                <img src="https://via.placeholder.com/70" alt="Imagen">
                <h5>Titulo del servicio</h5>
                <a href="#" class="expand-link" data-toggle="modal" data-target="#seeMoreService">expandir</a>
            </div>
            <div class="section-title">
                <h2>Ocultos</h2>
            </div>
            <div class="service-container" style="background-color: #d3d3d3;">
                <img src="https://via.placeholder.com/70" alt="Imagen">
                <h5>Titulo del servicio</h5>
                <a href="#" class="expand-link" data-toggle="modal" data-target="#seeMoreService">expandir</a>
            </div>
            <div class="service-container" style="background-color: #d3d3d3;">
                <img src="https://via.placeholder.com/70" alt="Imagen">
                <h5>Titulo del servicio</h5>
                <a href="#" class="expand-link" data-toggle="modal" data-target="#seeMoreService">expandir</a>
            </div>
            <div class="service-container" style="background-color: #d3d3d3;">
                <img src="https://via.placeholder.com/70" alt="Imagen">
                <h5>Titulo del servicio</h5>
                <a href="#" class="expand-link" data-toggle="modal" data-target="#seeMoreService">expandir</a>
            </div>
        </div>
    </div>
    <!-- Añadir -->
<div class="modal fade" id="serviceModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Servicio</h1>
            </div>
            <div class="modal-body">
                <form action="">
                    <label class="form-label" for="tip_serv">Tipo de Servicio</label>
                    <!-- Grupo de Radio Buttons -->
                        <div class="radio-red">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="radioCliente" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="radioCliente">Instalaciones Electricas y mantenimientos</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="radioGestorContenido" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="radioGestorContenido">Obra Civil</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="radioGestorRoles" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="radioGestorRoles">Construcción Ligera</label>
                            </div>
                        </div>
                    <label class="form-label" for="nom_serv">Nombre del Servicio</label>
                    <input class="form-control" type="text" name="nom_serv">
                    <label class="form-label" for="desc_serv">Descripcion del Servicio</label>
                    <textarea class="form-control" name="desc_serv" rows="3"></textarea>
                    <label class="form-label" for="desc_serv">Imagen del Servicio</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img_serv" name="img_serv">
                        <label class="custom-file-label" for="img_serv">Seleccionar archivo</label>
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
<div class="modal fade" id="seeMoreService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Titulo del Trabajo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Descripción del trabajo:</h5>
                            <p>Descripción del trabajo<br>
                                Descripción del trabajo<br>
                                Descripción del trabajo<br>
                                Descripción del trabajo<br>
                                Descripción del trabajo<br>
                                Descripción del trabajo</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="https://via.placeholder.com/300x200" alt="Imagen" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom">Ocultar/Mostrar</button>
                    <button type="button" class="btn btn-custom">Editar</button>
                    <button type="button" class="btn btn-custom" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
