<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";
    include 'class/database.php';
    $conexion = new database($_SESSION['usuario']);

	if(isset($busqueda) && $busqueda!=""){
		// aqui tengo que ajustar la busqueda multitable y agregar mas terminos de busqueda
		$consulta_datos="SELECT * FROM VistaCompletaSolicitudes WHERE ((usuario!='".$_SESSION['id']."') AND id_empleado IS NULL AND (nombre LIKE '%$busqueda%' OR a_p LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR correo LIKE '%$busqueda%')) ORDER BY nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(id_usuario) FROM VistaCompletaSolicitudes  WHERE ((usuario!='".$_SESSION['id']."') AND id_empleado IS NULL AND (nombre LIKE '%$busqueda%' OR a_p LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR correo LIKE '%$busqueda%'))";

	}else{

		$consulta_datos="SELECT * FROM VistaParcialSolicitudes  WHERE usuario='".$_SESSION['id']."' ORDER BY fecha_solicitud ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT( DISTINCT id_solicitud) FROM VistaParcialSolicitudes  WHERE usuario='".$_SESSION['id']."'";
		
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
            $query="SELECT DISTINCT tipo_servicio FROM VistaCompletaSolicitudes  WHERE usuario='".$_SESSION['id']."' AND id_solicitud='".$rows->id_solicitud."' ORDER BY fecha_solicitud";
            $solicitudes = $conexion->seleccionar($query);
            $query_archivo="SELECT DISTINCT archivo_ruta FROM VistaCompletaSolicitudes  WHERE usuario='".$_SESSION['id']."' AND id_solicitud='".$rows->id_solicitud."' ORDER BY fecha_solicitud";
            $archivos = $conexion->seleccionar($query_archivo);
			$tabla.='
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th>Trabajo solicitado el día:</th>
                            <td>'.$rows->fecha_solicitud.' </td>
                        </tr>
                        <tr>
                            <th>Fecha de entrega óptima:</th>
                            <td>'.$rows->fecha_esperada.'</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>'.$rows->direccion_completa.'</td>
                        </tr>
                        <tr>
                            <th>Referencia:</th>
                            <td>'.$rows->referencia.'</td>
                        </tr>
                        <tr>
                            <th>Tipo trabajo:</th>
                            <td>'.$rows->tipo_trabajo.'</td>
                        </tr>
                        <tr>
                            <th>Servicios solicitados:</th>
                            <td>';
                            /*$query2="SELECT * FROM VistaCompletaSolicitudes  WHERE usuario='".$_SESSION['id']."' AND tipo_servicio='".$solicitudes->tipo_servicio."' AND id_solicitud='".$rows->id_solicitud."'";
                            $servicios = $conexion->seleccionar($query2);

                            foreach ($solicitudes as $rows2) {
                                if ($rows2->tipo_servicio == "Instalaciones Eléctricas y mantenimientos") {
                                    $tabla .= "Instalaciones Eléctricas y mantenimientos <br>";
                                    foreach ($rows2 as $rows3) { // Asumiendo que $rows2->servicios es un array
                                        $tabla .= $rows3->servicio . "<br>";
                                    }
                                }
                                if ($rows2->tipo_servicio == "Obra civil") {
                                    $tabla .= "Obra civil <br>";
                                    foreach ($rows2 as $rows3) {
                                        $tabla .= $rows3->servicio . "<br>";
                                    }
                                }
                                if ($rows2->tipo_servicio == "Construccion ligera") {
                                    $tabla .= "Construccion ligera <br>";
                                    foreach ($rows2 as $rows3) {
                                        $tabla .= $rows3->servicio . "<br>";
                                    }
                                }
                            }*/

                            foreach ($solicitudes as $rows2) {
                                $query2="SELECT DISTINCT servicio FROM VistaCompletaSolicitudes  WHERE usuario='".$_SESSION['id']."' AND tipo_servicio='".$rows2->tipo_servicio."' AND id_solicitud='".$rows->id_solicitud."'";
                                $servicios = $conexion->seleccionar($query2);

                                $tabla .= "<strong>".$rows2->tipo_servicio."</strong> <br>";
                                foreach ($servicios as $rows3) {
                                    $tabla .= $rows3->servicio . "<br>";
                                }
                                }
                                /*if ($rows2->tipo_servicio == "Instalaciones Eléctricas y mantenimientos") {
                                    $tabla .= "Instalaciones Eléctricas y mantenimientos <br>";
                                    foreach ($rows2 as $rows3) { // Asumiendo que $rows2->servicios es un array
                                        $tabla .= $rows3->servicio . "<br>";
                                    }
                                }
                                if ($rows2->tipo_servicio == "Obra civil") {
                                    $tabla .= "Obra civil <br>";
                                    foreach ($rows2 as $rows3) {
                                        $tabla .= $rows3->servicio . "<br>";
                                    }
                                }
                                if ($rows2->tipo_servicio == "Construccion ligera") {
                                    $tabla .= "Construccion ligera <br>";
                                    foreach ($rows2 as $rows3) {
                                        $tabla .= $rows3->servicio . "<br>";
                                    }
                                }
                            }*/
                            
                            $tabla .= '</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>';
                            if ($rows->estado_orden == NULL) {
                                $tabla .= $rows->estado_solicitud;
                            }
                            else{
                                $tabla .= $rows->estado_orden;
                            }
                            $tabla.='</td>
                        </tr>
                        <tr>
                            <th>Archivos enviados:</th>
                            <td>';
                            foreach($archivos as $rows2){
                                $tabla.=$rows2->archivo_ruta . "<br>";
                            }
                            $tabla .= '</td>
                        </tr>
                        <tr>
                            <th>Comentarios:</th>
                            <td>'.$rows->comentarios.'</td>
                        </tr>
                    </tbody>
                </table>'.
                $id_solicitud=$rows->id_solicitud
                .'<button type="button" class="btn btn-custom"><a href="index.php?vista=editar_mi_cotizacion" class="custom-link">Editar</a></button>
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
		$tabla.='<p class="has-text-right">Mostrando cotizaciones <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion->desconectardb();
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo $main->paginador_tablas($pagina,$Npaginas,$url,7);
	}
/*	echo "<pre>";
	print_r(get_defined_vars());
	echo "</pre>";
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