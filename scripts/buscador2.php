<?php
    include 'class/database.php';
    $buscador=mysqli_query("SELECT * FROM vista_usuarios WHERE ((id_usuario!='".$_SESSION['id']."') AND id_empleado IS NULL AND (nombre LIKE '%$busqueda%' OR a_p LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR correo LIKE '%$busqueda%')) ORDER BY nombre ASC LIMIT $inicio,$registros");
    $resultado=mysqli_num_rows($buscador);

?>
<h5 class="card-tittle"> RESULTADOS ENCONTRADOS(<?php echo $numeros; ?>):</h5>

<?php while ($resultado=mysqli_fetch_assoc($buscador)){ ?>
    <p class="card-text"> <?php echo $resultado["nombre"]; ?> - <?php echo $resultados["tema"] ?></p>
    <?php }
?>