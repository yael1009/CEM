<?php
// esta madre es para los archivos a subir pero ps todavia no esta 
if(mime_content_type($_FILES['fichero']['tmp_name'])!="image/jpeg" && mime_content_type($_FILES['fichero']['tmp_name'])!="image/png"){
    echo "Tipo de fichero no admitido";
    exit();
}

if(($_FILES['fichero']['size']/1024)>3072){
    echo "El archivo supera el peso permitido";
    exit();
}

//Si no existe el directorio se crea
if(!file_exists("archivos")){
    if(!mkdir("archivos",0777)){
        echo "Error al crear el directorio";
        exit();
    }
}

//se dan permisos de lectrua y escritura
chmod("archivos",0777);

if(move_uploaded_file($_FILES['fichero']['tmp_name'],"archivos/".$_FILES['fichero']['name'])){
    echo "Archivo subido con exito";
}else{
    echo "Error al subir el archivo";
}