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

    //Esto sirve para ir imprimiendo los registros de la bd de manera aca chida
    function paginador_tablas($pagina,$Npaginas,$url,$botones){
		$tabla='<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">';

		if($pagina<=1){
			$tabla.='
			<a class="pagination-previous is-disabled" disabled >Anterior</a>
			<ul class="pagination-list">';
		}else{
			$tabla.='
			<a class="pagination-previous" href="'.$url.($pagina-1).'" >Anterior</a>
			<ul class="pagination-list">
				<li><a class="pagination-link" href="'.$url.'1">1</a></li>
				<li><span class="pagination-ellipsis">&hellip;</span></li>
			';
		}

		$ci=0;
		for($i=$pagina; $i<=$Npaginas; $i++){
			if($ci>=$botones){
				break;
			}
			if($pagina==$i){
				$tabla.='<li><a class="pagination-link is-current" href="'.$url.$i.'">'.$i.'</a></li>';
			}else{
				$tabla.='<li><a class="pagination-link" href="'.$url.$i.'">'.$i.'</a></li>';
			}
			$ci++;
		}

		if($pagina==$Npaginas){
			$tabla.='
			</ul>
			<a class="pagination-next is-disabled" disabled >Siguiente</a>
			';
		}else{
			$tabla.='
				<li><span class="pagination-ellipsis">&hellip;</span></li>
				<li><a class="pagination-link" href="'.$url.$Npaginas.'">'.$Npaginas.'</a></li>
			</ul>
			<a class="pagination-next" href="'.$url.($pagina+1).'" >Siguiente</a>
			';
		}

		$tabla.='</nav>';
		return $tabla;
	}
}
?>