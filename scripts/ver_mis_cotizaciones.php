<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";
    include 'class/database.php';
    $conexion = new database($_SESSION['usuario']);

	if(isset($busqueda) && $busqueda!=""){
		// aqui tengo que ajustar la busqueda multitable y agregar mas terminos de busqueda
		$consulta_datos="SELECT * FROM VistaCompletaSolicitudes WHERE ((usuario!='".$_SESSION['id']."') AND id_empleado IS NULL AND (nombre LIKE '%$busqueda%' OR a_p LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR correo LIKE '%$busqueda%')) GROUP BY id_solicitud ORDER BY fecha_solicitud ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT( DISTINCT id_usuario) FROM VistaCompletaSolicitudes  WHERE ((usuario!='".$_SESSION['id']."') AND (nombre LIKE '%$busqueda%' OR a_p LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR correo LIKE '%$busqueda%'))";

	}else{

		$consulta_datos="SELECT * FROM VistaCompletaSolicitudes  WHERE usuario='".$_SESSION['id']."' GROUP BY id_solicitud ORDER BY fecha_solicitud ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT( DISTINCT id_solicitud) FROM VistaCompletaSolicitudes  WHERE usuario='".$_SESSION['id']."'";
		
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
                            foreach ($solicitudes as $rows2) {
                                $query2="SELECT DISTINCT servicio FROM VistaCompletaSolicitudes  WHERE usuario='".$_SESSION['id']."' AND tipo_servicio='".$rows2->tipo_servicio."' AND id_solicitud='".$rows->id_solicitud."'";
                                $servicios = $conexion->seleccionar($query2);

                                $tabla .= "<strong>".$rows2->tipo_servicio."</strong> <br>";
                                foreach ($servicios as $rows3) {
                                    $tabla .= $rows3->servicio . "<br>";
                                }
                                }          
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
                        </tr>';
                        if ($rows->id_venta !== NULL){
                            $tabla.='
                            <tr>
                                <th>Subtotal:</th>
                                <td>'.$rows->subtotal.'</td>
                            </tr>
                            <tr>
                                <th>IVA:</th>
                                <td>'.$rows->iva.'</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>'.$rows->total.'</td>
                            </tr>';
                        }
                        $tabla.='<tr>
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
                </table>
                <br>
                <div class="button-container">
                <form action="" method="POST" autocomplete="off" >
                <input type="hidden" name="cancelar">   
                        <button class="btn btn-custom" type="submit" >Cancelar orden</button>
                </form>
                <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#EditarModal">Editar</button>
                </div>
                <br>
            ';
            $id_solicitud=$rows->id_solicitud;
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