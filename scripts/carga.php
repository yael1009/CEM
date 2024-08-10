<?php
// validacion para el tipo de archivo unciamente sea pdf
if(mime_content_type($_FILES['fichero']['tmp_name'])!="aplication/pdf"){
    echo $main->mensaje_error("Tipo de fichero no admitido");
    exit();
}

//se calcula el archivo en kilobytes
if(($_FILES['fichero']['size']/1024)>5120){
    echo $main->mensaje_error("El archivo supera el peso permitido");
    exit();
}

//Si no existe el directorio se crea
if(!file_exists("../../archivos")){
    //mkdir crea la carpeta
    if(!mkdir("archivos",0777)){
        echo "Error al crear el directorio";
        exit();
    }
}

//se dan permisos de lectrua y escritura
chmod("archivos",0777);

//
if(!move_uploaded_file($_FILES['fichero']['tmp_name'],"../../archivos/".$_FILES['fichero']['name'])){
    echo $main->mensaje_error("Error al subir el archivo");
    exit();
}