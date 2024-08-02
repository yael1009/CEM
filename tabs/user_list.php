<!-- Clientes -->
<div class="tab-pane fade show active" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">
    <div class="profile-container mt-4">

        <?php
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
            $busqueda="";

            require_once "./scripts/usuario_lista.php";
        ?>
    </div>
</div>