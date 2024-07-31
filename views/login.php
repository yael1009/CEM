    <!--login-->
    <div class="container d-flex justify-content-center">
        <div class="login-container">
            <div style="text-align: center;">
                <h1 class="mb-4">Iniciar sesión</h1>
                <p class="rojito">Si ya está registrado en nuestra página, puede ingresar sus datos aquí. Si aún no tiene una cuenta, puede crear una cuenta nueva para acceder al servicio.</p>

            </div>
            <form action="" method="post" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label" for="usuario">Usuario:</label>
                    <input class="form-control" type="text" name="usuario" pattern="[a-zA-Z0-9]{4,50}" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
                </div>
                <div class="centra-boton">
                    <button type="button" class="btn btn-custom"><a class="custom-link" href="index.php?vista=registro">Crear Cuenta</a></button>
                    <button type="submit" class="btn btn-custom">Iniciar sesión</button>
                </div>
            </form>
            
            <?php
			if(isset($_POST['usuario']) && isset($_POST['password'])){
				require_once "../class/main.php";
				require_once "../scripts/iniciar_sesion.php";
			}
		    ?>

        </div>
    </div>
