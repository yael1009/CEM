<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";
	include 'class/database.php';
    $conexion = new database($_SESSION['usuario']);

	if(isset($busqueda) && $busqueda!=""){
		$consulta_datos="SELECT * FROM vista_usuarios WHERE ((id_usuario!='".$_SESSION['id']."') AND id_empleado IS NOT NULL AND (nombre LIKE '%$busqueda%' OR a_p LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR correo LIKE '%$busqueda%')) GROUP BY id_usuario ORDER BY nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(DISTINCT id_usuario) FROM vista_usuarios WHERE ((id_usuario!='".$_SESSION['id']."') AND id_empleado IS NOT NULL AND (nombre LIKE '%$busqueda%' OR a_p LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR correo LIKE '%$busqueda%'))";
	}else{
		$consulta_datos="SELECT * FROM vista_usuarios WHERE id_usuario!='".$_SESSION['id']."' AND id_empleado IS NOT NULL GROUP BY id_usuario ORDER BY usuario ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(DISTINCT id_usuario) FROM vista_usuarios WHERE id_usuario!='".$_SESSION['id']."' AND id_empleado IS NOT NULL";
	}
	
	//$conexion->conectardb();

    $datos = $conexion->seleccionar($consulta_datos);
    $total = $conexion->contar_resultados($consulta_total);

    //ceil redondea a su entero proximo
	$Npaginas =ceil($total/$registros);

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
			<div class="personal-card">
				<div class="step">
					<div class="details">
						<img src="img/foto_perfil_personal.jpg" alt="Foto de perfil" class="profile-img-cuad">
						<p>'.$rows->usuario.'</p>
						<p>'.$rows->nombre.'</p>
						<p>Rol</p>
						<p><a href="#" class="text-danger">expandir</a></p>
					</div>
				</div>
			</div>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="7">
						<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
							Haga clic acá para recargar el listado
						</a>
					</td>
				</tr>
			';
		}else{
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="7">
						No hay registros en el sistema
					</td>
				</tr>
			';
		}
	}

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando usuarios <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion->desconectardb();
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo $main->paginador_tablas($pagina,$Npaginas,$url,7);
	}