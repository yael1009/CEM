<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";
    include 'class/database.php';
    $conexion = new database($_SESSION['usuario']);

	if(isset($busqueda) && $busqueda!=""){
		// aqui tengo que ajustar la busqueda multitable y agregar mas terminos de busqueda
		$consulta_datos="SELECT * FROM VistaCompletaSolicitudes WHERE ((id_usuario!='".$_SESSION['id']."') $distintivo AND (servicio LIKE '%$busqueda%' OR tipo_servicio LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR direccion_completa LIKE '%$busqueda%' OR tipo_trabajo LIKE '%$busqueda%')) GROUP BY id_solicitud ORDER BY fecha_solicitud ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT( DISTINCT id_solicitud) FROM VistaCompletaSolicitudes  WHERE ((id_usuario!='".$_SESSION['id']."') $distintivo AND (servicio LIKE '%$busqueda%' OR tipo_servicio LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR direccion_completa LIKE '%$busqueda%' OR tipo_trabajo LIKE '%$busqueda%'))";

	}else{

		$consulta_datos="SELECT * FROM VistaCompletaSolicitudes  WHERE id_usuario!='".$_SESSION['id']."' $distintivo GROUP BY id_solicitud ORDER BY fecha_solicitud ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT( DISTINCT id_solicitud) FROM VistaCompletaSolicitudes  WHERE id_usuario!='".$_SESSION['id']."' $distintivo";
		
	}

  /*  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Procesa el formulario aquí

        // Redirige después de procesar
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }*/


	
	//$conexion->conectardb();

    $datos = $conexion->seleccionar($consulta_datos);
    $total = $conexion->contar_resultados($consulta_total);

    //ceil redondea a su entero proximo
	$Npaginas =ceil($total/$registros);

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
            if(!isset($cancelado)){
            $clase = ($rows->estado_solicitud == "Visto") ? 'seen' : 'Nseen';
            }else{
                $clase = $cancelado;
            }
			$tabla.="
                        <div class='col-md-12'>
                            <div class='project-card $clase'>
                                <img src='img/foto_perfil_clientes.jpg' alt='Foto de perfil'>
                                <div class='project-info'>
                                    <p><strong>$rows->usuario</strong></p>
                                    <p>$rows->fecha_esperada</p>
                                    <p>$rows->direccion_completa</p>
                                </div>
                                <form action='' method='POST' autocomplete='off' >
                                <input type='hidden' name='id_solicitud' value='".$rows->id_solicitud."'>   
                                    <button class='btn' type='submit' >
                                    <p class='text-danger'>expandir</p>
                                    </button>
                                </form>
                            </div>
                        </div>
            ";
            $id_solicitud=$rows->id_solicitud;
            //aqui si quiero volver a lo anterior solo meto action y quito todo el if
            if(isset($_POST['id_solicitud'])){
                $id_solicitud = $main->limpiarstring($_POST['id_solicitud']);
                $_SESSION['id_solicitud'] = $id_solicitud;
                header("Location: index.php?vista=expandir_orden");
                exit;			}
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