<?php
class main
{
	//Esta funcion sirve para verificar que ningun campo required este vacio por si le mueven al html, validacion de back
    public function validar_campos_vacios(array $fields) 
	{
		$bool= true;
        foreach ($fields as $field) 
		{
            if (empty($field)) {
				$bool= false;
            }
        }
		return $bool;
    }

	/*Esto sirve para que si cambian el codigo html desde la pagina 
    no puedan insertar por ejemplo si es int letras o si su limite es 100 q metan 200#, validacion de back*/
    function verificar_datos($filtro,$cadena){
		if(preg_match("/^".$filtro."$/", $cadena)){
			return false;
        }else{
            return true;
        }
	}

	function mensaje_error($especifica)
	{
		$mensaje ='<div class="alert alert-danger">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                '.$especifica.'
            	</div>';
		return $mensaje;
	}

    // Trim sirve para eliminar espacios en blanco
    // striplashes cambia las \
    // str_ireplace determinas palabras y las remplazas por otras
    public function limpiarstring($string) { 
        $bannedWords=["<script>","</script>","<script src","<script type=","SELECT * FROM","SELECT "," SELECT ","DELETE FROM","INSERT INTO","DROP TABLE","DROP DATABASE","TRUNCATE TABLE","SHOW TABLES","SHOW DATABASES","<?php","?>","--","^","<",">","==","=",";","::"];

        $string=trim($string);
        $string=stripslashes($string);

        foreach($bannedWords as $bannedWord){
            $string=str_ireplace($bannedWord, "", $string);
        }

        $string=trim($string);
        $string=stripslashes($string);

        return $string;
    }

	//Esto es para meter bindparams a los marcadores de los inserts
    public function bindParams($query, $params) {
        foreach ($params as $parametro => $valor) {
            $query->bindParam($parametro, $valor);
        }
    }
    //Esto es para guardar correctamente las fotos dentro de la base de datos
    function renombrar_fotos($nombre){
		$nombre=str_ireplace(" ", "_", $nombre);
		$nombre=str_ireplace("/", "_", $nombre);
		$nombre=str_ireplace("#", "_", $nombre);
		$nombre=str_ireplace("-", "_", $nombre);
		$nombre=str_ireplace("$", "_", $nombre);
		$nombre=str_ireplace(".", "_", $nombre);
		$nombre=str_ireplace(",", "_", $nombre);
		$nombre=$nombre."_".rand(0,100);
		return $nombre;
	}

	//Esto es para evitar que entren a URLS a las q no deberian (no la e usado por weba de crear la instancia y pq ps ajanose)
	function verificar_autenticacion() {
		if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
			// Redirigir a la página de inicio si el usuario no está autenticado
			header("Location: index.php?vista=home");
			exit();
		}
	}

    /*LE MOVI ENTONCES A VER SI NO SE DESMADRO
	  Pagina de default es 1, si avanzas o regresas se suma o resta
	  Npaginas es el numero total de paginas que hay, se calcula diviendo $registros entre  paginas
	  botones son todos los que quieras qeu aparezcan*/
    function paginador_tablas($pagina,$Npaginas,$url,$botones){
		//etiqueta de apaertura de navegacion
		$tabla='    <div class="text-center">
		<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">';

		//se comprueba si la pagina es 1, se deshabilita el boton anterior (laa clase disable no existe)
		if($pagina<=1){
			//boton de anterior y apertura de navegacion
			$tabla.= //
			'
			<button class="btn btn-custom text-left mx-1"><a class="pagination-previous is-disabled" disabled >Anterior</a></button>
			<ul class="pagination-list">';
		}else{
			$tabla.='
			<button class="btn btn-custom text-left mx-1"><a class="pagination-previous" href="'.$url.($pagina-1).'" >Anterior</a></button>
			<ul class="pagination-list">
				<button class="btn btn-custom text-left mx-1"><li><a class="pagination-link" href="'.$url.'1">1</a></li></button>
				<li><span class="pagination-ellipsis">&hellip;</span></li>
			';
		}

		//Botones de enmedio
		//contador de ciclos o iteraciones
		$ci=0;
		// Se empieza a contar desde la pagina actual
		for($i=$pagina; $i<=$Npaginas; $i++){
			//si el contador alcanza los botones deseados se rompre el ciclo
			if($ci>=$botones){
				break;
			}
			if($pagina==$i){
				//es la pagina actual para q tenga una clase diferente
				$tabla.='<li><button class="btn btn-custom rounded-circle mx-1"><a class="pagination-link is-current" href="'.$url.$i.'">'.$i.'</a></li></button>';
			}else{
				$tabla.='<li><button class="btn btn-custom rounded-circle mx-1"><a class="pagination-link" href="'.$url.$i.'">'.$i.'</a></li></button>';
			}
			$ci++;

		}

		//Boton de siguiente
		if($pagina==$Npaginas){
			$tabla.='
			</ul>
			<button class="btn btn-custom text-right mx-1"><a class="pagination-next is-disabled" disabled >Siguiente</a></button>
			';
		}else{
			$tabla.='
				<li><span class="pagination-ellipsis">&hellip;</span></li>
				<button class="btn btn-custom text-right mx-1"><li><a class="pagination-link" href="'.$url.$Npaginas.'">'.$Npaginas.'</a></li></button>
			</ul>
			<button class="btn btn-custom text-right mx-1" href="'.$url.($pagina+1).'"><a class="pagination-next" href="'.$url.($pagina+1).'" >Siguiente</a></button>
			';         

		}

		$tabla.='</nav></div>';
		return $tabla;
	}
}
?>