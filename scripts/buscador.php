<?php
    $main = new main();
    //Agarra el name de la barra de busqueda
	$modulo_buscador=$main->limpiarstring($_POST['modulo_buscador']);

    //nombres permitidos
	$modulos=["usuario","solicitudes","insumos"];

    //verifica si el nombre es correcto con los permitidos
	if(in_array($modulo_buscador, $modulos)){
		
        //si es correcto, nombra la variable segun el nombre para redirijir a la url
		$modulos_url=[
			"usuario"=>"roles",
			"solicitudes"=>"cotizaciones",
			"insumos"=>"product_search"
		];

        //Iguala la variable al nombre quese ingresa
		$modulos_url=$modulos_url[$modulo_buscador];

		$modulo_buscador="busqueda_".$modulo_buscador;


		# Iniciar busqueda #
        //si la busqueda esta escrita
		if(isset($_POST['txt_buscador'])){

			$txt=$main->limpiarstring($_POST['txt_buscador']);

            //si es nulo
			if($txt==""){
                echo $main->mensaje_error("Introduce el termino de busqueda");
			}else{
                //verificacion formato
				if($main->verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}",$txt)){
                    echo $main->mensaje_error("El termino de busqueda no coincide con el formato solicitado");

			    }else{
                    //si todo esta correcto, redirige a la url
			    	$_SESSION[$modulo_buscador]=$txt;
			    	//header("Location: index.php?vista=$modulos_url",true,303); 
 					exit();  
			    }
			}
		}


		# Eliminar busqueda #
		if(isset($_POST['eliminar_buscador'])){
			unset($_SESSION[$modulo_buscador]);
			//header("Location: index.php?vista=$modulos_url",true,303); 
 			exit();
		}

	}else{
        echo $main->mensaje_error("No podemos procesar la peticion");
	}