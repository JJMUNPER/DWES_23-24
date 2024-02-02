<?php

/**
 * Ejemplo 19
 * 
 * Añadir todos los archivos de una carpeta
 * 
 * Para usar ZipArchive es necesario ir a php.ini y 
 * habiliatar extension=zip puesto que esta comentado
 */

//Creamos objeto de la clase ZipArchive
$zip = new ZipArchive();

//Abrir archivo zip
if ($zip->open('files.zip', ZIPARCHIVE::CREATE) === TRUE) {

    $files = glob('files/*');

    foreach($files as $file){
        
        $zip->addFile($file);
    }
    

    //proceso finalizado
    $zip->close();
    echo "Carpeta comprimida correctamente";

} else {
    echo "Error";
    
}

?>