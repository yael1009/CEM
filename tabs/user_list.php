<!-- Clientes -->
<div class="tab-pane fade <?php echo $tab == 'tabclientes' ? 'show active' : ''; ?>" id="tabclientes" role="tabpanel" aria-labelledby="clientes-tab">
    <div class="profile-container mt-4">
        <div class="container pb-6 pt-6">
        <?php
            //require_once "../class/main.php";

            if(isset($_POST['modulo_buscador'])){
                $_SESSION['tab'] = 'tabclientes';
                require_once "scripts/buscador.php";
            }

            if(!isset($_SESSION['busqueda_usuario']) && empty($_SESSION['busqueda_usuario'])){
        ?>
        <div class="columns">
            <div class="column">
                <form action="" method="POST" autocomplete="off" >
                    <input type="hidden" name="modulo_buscador" value="usuario">   
                    <div class="field is-grouped">
                        <p class="control is-expanded">
                            <input class="input is-rounded" type="text" name="txt_buscador" placeholder="¿Qué estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30" >
                        </p>
                        <p class="control">
                            <button class="button is-info" type="submit" >Buscar</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        
        <?php }else{ ?>
        <div class="columns">
            <div class="column">
                <form class="has-text-centered mt-6 mb-6" action="" method="POST" autocomplete="off" >
                    <input type="hidden" name="modulo_buscador" value="usuario"> 
                    <input type="hidden" name="eliminar_buscador" value="usuario">
                    <p>Estas buscando <strong>“<?php echo $_SESSION['busqueda_usuario']; ?>”</strong></p>
                    <br>
                    <button type="submit" class="button is-danger is-rounded">Eliminar busqueda</button>
                </form>
            </div>
        </div>
            <?php
                            # Eliminar usuario #
                if(isset($_GET['user_id_del'])){
                    require_once "./php/usuario_eliminar.php";
                }

                if(!isset($_GET['page'])){
                    $pagina=1;
                }else{
                    $pagina=(int) $_GET['page'];
                    if($pagina<=1){
                        $pagina=1;
                    }
                }

                $main=new main();

                // si no esta definida la variable se le asigna 1
                if(!isset($_GET['page'])){
                    $pagina=1;
                }else{ //se recoge a variable y se convierte en entero
                    $pagina=(int) $_GET['page'];
                    if($pagina<=1){
                        $pagina=1;
                    }
                }
            
                $pagina=$main->limpiarstring($pagina);
                $url="index.php?vista=roles&page=";
                $registros=5;
                $busqueda=$_SESSION['busqueda_usuario']; /* <== */

                require_once "./scripts/usuario_lista.php";
            }
            ?>
        </div>
    </div>
</div>