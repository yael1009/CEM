<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3 mb-3" style="width: 30%; box-shadow: 0px 0px 5px #000; border-radius: 10px; padding: 15px;">
        <h1>Login</h1>
        <form action="../scripts/registro.php" method="POST">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" required pattern="\w+">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required pattern="[A-Za-z\s]+">
            </div>
            <div class="mb-3">
                <label for="apellido_paterno" class="form-label">Apellido paterno</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" required pattern="[A-Za-z\s]+">
            </div>
            <div class="mb-3">
                <label for="apellido_materno" class="form-label">Apellido materno</label>
                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" required pattern="[A-Za-z\s]+">
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" required pattern="\d{10}">
            </div>
            <div class="mb3">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-select" required>
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="masculino" class="form-control">Masculino</option>
                    <option value="femenino" class="form-control">Femenino</option>
                    <option value="otro" class="form-control">Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" required minlength="8">
            </div>
            <div class="mb-3">
                <input type="submit" name="reg" id="reg" class="form-control" value="Registrarse">
            </div>
        </form>
        <div class="container">
            <p>¿Ya tienes cuenta? <a href="inicio_sesion.php">Inicia sesión</a></p>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>