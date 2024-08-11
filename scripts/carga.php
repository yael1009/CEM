<?php
// Incluye este script en tu formulario con `include`
// Recorre todos los archivos subidos
foreach ($_FILES['archivos']['tmp_name'] as $key => $tmp_name) {
    
    // Validación del tipo de archivo: solo PDF
    if (mime_content_type($tmp_name) != "application/pdf") {
        echo $main->mensaje_error("Tipo de fichero no admitido para el archivo " . $_FILES['archivos']['name'][$key]);
        exit();
    }

    // Calcula el tamaño del archivo en kilobytes
    if (($_FILES['archivos']['size'][$key] / 1024) > 5120) {
        echo $main->mensaje_error("El archivo " . $_FILES['archivos']['name'][$key] . " supera el peso permitido");
        exit();
    }

    // Si no existe el directorio, se crea
    if (!file_exists("../../archivos")) {
        if (!mkdir("../../archivos", 0777, true)) { // Usa la ruta correcta
            echo $main->mensaje_error("Error al crear el directorio");
            exit();
        }
    }

    // Se dan permisos de lectura y escritura al directorio
    chmod("../../archivos", 0777);

    // Mueve el archivo al directorio deseado
    if (!move_uploaded_file($tmp_name, "../../archivos/" . $_FILES['archivos']['name'][$key])) {
        echo $main->mensaje_error("Error al subir el archivo " . $_FILES['archivos']['name'][$key]);
        exit();
    }
}
?>
