<!-- Clientes -->
<div class="tab-pane fade show active" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">
    <div class="profile-container mt-4">
      <div class="service-divider"></div>


        <?php


        if(!isset($_SESSION['busqueda_usuario']) && empty($_SESSION['busqueda_usuario'])){
            require_once "./class/main.php";

            if(isset($_POST['modulo_buscador'])){
                require_once "./scripts/buscador.php";
                $busqueda=$_SESSION['busqueda_usuario']; 
            }
        ?>


        <div class="centerr">
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

        
        <?php }else{ ?>
        <div class="columns">
            <div class="column">
                <form class="has-text-centered mt-6 mb-6" action="" method="POST" autocomplete="off" >
                    <input type="hidden" name="modulo_buscador" value="usuario"> 
                    <input type="hidden" name="eliminar_buscador" value="usuario">
                    <p>Estas buscando <strong>“<?php echo $_SESSION['busqueda_usuario']; ?>”</strong></p>
                    <br>
                    <button type="submit" class="btn btn-custom">Eliminar busqueda</button>
                </form>
            </div>
        </div>


        <?php 
        $busqueda=$_SESSION['busqueda_usuario']; 
        require_once "./scripts/buscador.php";
        
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

            include 'scripts/usuario_lista.php';

          /*  if(!isset($_SESSION['busqueda_usuario']) && empty($_SESSION['busqueda_usuario'])){
                require_once "scripts/buscador.php";
                $busqueda=$_SESSION['busqueda_usuario']; 
                }
                echo "<pre>"; 
                print_r(get_defined_vars());
                echo "</pre>"; *//**///*// */
			
          /*  if(!isset($_SESSION['busqueda_usuario']) || $_SESSION['busqueda_usuario']==""){
                $busqueda=$_SESSION['busqueda_usuario']; 
            } */           

            
            
        ?>

            
    </div>
</div>