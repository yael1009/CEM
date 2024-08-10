    <!--registro-->
    <div class="container d-flex justify-content-center">
        <div class="login-container">
            <div style="text-align: center;">
                <h1 class="mb-4">Crear Cuenta</h1>
                <p class="rojito">¡Regístrate hoy y accede a servicios exclusivos! Disfruta de una experiencia personalizada y soluciones a medida. ¡Únete ahora y aprovecha todas nuestras ventajas!</p>
            </div>
            <?php
			if(isset($_POST['nombre']) && isset($_POST['apaterno']) && isset($_POST['amaterno']) && isset($_POST['tel'])
            && isset($_POST['correo']) && isset($_POST['usuario']) && isset($_POST['pass']) && isset($_POST['compañia'])
            && isset($_POST['cargo'])){
				require_once "scripts/c_registro.php";
			}
		    ?>
            <form action="" method="post" autocomplete="off" class="FormularioAjax">
                <div class="mb-3">
                    <label class="form-label" for="nombre">Nombres</label>
                    <input class="form-inicio" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}" maxlength="60" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="apaterno">Apellido Paterno</label>
                    <input class="form-inicio" type="text" name="apaterno" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="amaterno">Apellido Materno</label>
                    <input class="form-inicio" type="text" name="amaterno" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tel">Telefono</label>
                    <input class="form-inicio" type="text" name="tel" pattern="[0-9]+" maxlength="10" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="correo">Correo:</label>
                    <input class="form-inicio" type="email" name="correo" pattern="[a-zA-Z0-9$@.]{7,100}" maxlength="100" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="usuario">Usuario:</label>
                    <input class="form-inicio" type="text" name="usuario" pattern="[a-zA-Z0-9]{4,50}" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="pass">Password:</label>
                    <input class="form-inicio" type="password" name="pass" pattern="[a-zA-Z0-9$@.]{7,100}" maxlength="100" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="compañia">Uso de la Cuenta</label>
                    <input class="form-inicio" type="text" name="compañia" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" placeholder="Personal/Compañia">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="cargo">Cargo en la Compañia</label>
                    <input class="form-inicio" type="text" name="cargo" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" placeholder="Personal/Propietario/Gerente/Constructor">
                </div>
                <div class="centra-boton">
                    <button type="submit" class="btn btn-custom">Crear Cuenta</button>
                    <button type="button" class="btn btn-custom">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>