<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";
    $conexion = new database();

	if(isset($busqueda) && $busqueda!=""){
            // aqui tengo que ajustar la busqueda multitable y agregar mas terminos de busqueda
		$consulta_datos="SELECT * FROM vista_usuarios WHERE ((id_usuario!='".$_SESSION['id']."') AND id_empleado IS NULL AND (nombre LIKE '%$busqueda%' OR a_p LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR correo LIKE '%$busqueda%')) ORDER BY nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(id_usuario) FROM vista_usuarios WHERE ((id_usuario!='".$_SESSION['id']."') AND id_empleado IS NULL AND (nombre LIKE '%$busqueda%' OR a_p LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR correo LIKE '%$busqueda%'))";

	}else{

		$consulta_datos="SELECT * FROM vista_usuarios WHERE id_usuario!='".$_SESSION['id']."' AND id_empleado IS NULL ORDER BY usuario ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(id_usuario) FROM vista_usuarios WHERE id_usuario!='".$_SESSION['id']."' AND id_empleado IS NULL";
		
	}

	$conexion->conectardb();

    $datos = $conexion->seleccionar($consulta_datos);
    $total = (int) $conexion->contar($consulta_total); 

    //ceil redondea a su entero proximo
	$Npaginas =ceil($total/$registros);

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
				<div class="profile-card">
					<div class="step">
						<img src="img/foto_perfil_clientes.jpg" alt="Foto de perfil" class="profile-img-cuad">
						<p>'.$rows->usuario.'</p>
						<p>'.$rows->nombre.'</p>
						<a href="#" class="text-danger" data-toggle="modal" data-target="#SeeMoreUser">expandir</a>
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
/*
	$tabla.='
	<div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                	<th>#</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
	';

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
				<tr class="has-text-centered" >
					<td>'.$contador.'</td>
                    <td>'.$rows->nombre.'</td>
                    <td>'.$rows->a_p.'</td>
                    <td>'.$rows->usuario.'</td>
                    <td>'.$rows->correo.'</td>
                    <td>
                        <a href="index.php?vista=user_update&user_id_up='.$rows->id_usuario.'" class="button is-success is-rounded is-small">Actualizar</a>
                    </td>
                    <td>
                        <a href="'.$url.$pagina.'&user_id_del='.$rows->id_usuario.'" class="button is-danger is-rounded is-small">Eliminar</a>
                    </td>
                </tr>
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


	$tabla.='</tbody></table></div>';

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando usuarios <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion->desconectardb();
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo $main->paginador_tablas($pagina,$Npaginas,$url,7);
	}
		*/