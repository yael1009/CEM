<div class="container mt-4">
<h1 class="text-center">Soliciudes</h1>

    <div class="service-divider"></div>
    <?php
        require_once "./class/main.php";
        $main = new main();

        if(isset($_POST['modulo_buscador'])){
            require_once "./scripts/buscador.php";
        }

        if(!isset($_SESSION['busqueda_solicitud']) && empty($_SESSION['busqueda_solicitud'])){
    ?>
    <div class="columns">
        <div class="column">
            <form action="" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="usuario">   
                <div class="field is-grouped">
                    <p class="control is-expanded">
                        <input class="form-control" type="text" name="txt_buscador" placeholder="¿Qué estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30" >
                    </p>
                    <p class="control">
                        <button class="btn btn-custom" type="submit" >Buscar</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <?php }else{ ?>
    <div class="columns">
        <div class="column">
            <form class="has-text-centered mt-6 mb-6" action="" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="solicitud"> 
                <input type="hidden" name="eliminar_buscador" value="solicitud">
                <p>Estas buscando <strong>“<?php echo $_SESSION['busqueda_solicitud']; ?>”</strong></p>
                <br>
                <button type="submit" class="btn btn-custom">Eliminar busqueda</button>
            </form>
        </div>
    </div>

    <?php
            $busqueda=$_SESSION['busqueda_solicitud']; /* <== */

        }
            echo '<div class="row">';
            # Eliminar usuario #
            /*if(isset($_GET['user_id_del'])){
                require_once "./php/usuario_eliminar.php";
            }*/

            if(!isset($_GET['page'])){
                $pagina=1;
            }else{
                $pagina=(int) $_GET['page'];
                if($pagina<=1){
                    $pagina=1;
                }
            }

            $pagina=$main->limpiarstring($pagina);
            $url="index.php?vista=ordenes_solicitudes&page="; /* <== */
            $registros=5;

            # Paginador usuario #
            require_once "./scripts/solicitud.php";
    ?>
    <br>
                </div>
            </div>