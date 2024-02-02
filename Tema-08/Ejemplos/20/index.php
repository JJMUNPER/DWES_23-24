<?php

/**
 * Ejemplo 20
 * 
 * Descomprimir archivos zip
 * 
 * Para usar ZipArchive es necesario ir a php.ini y 
 * habiliatar extension=zip puesto que esta comentado
 */

//Creamos objeto de la clase ZipArchive
$zip = new ZipArchive();

//Abrir archivo zip
if ($zip->open('files.zip') === TRUE) {

    $zip->extractTo('segunda/');

    //proceso finalizado
    $zip->close();
    echo "Descomprimido correctamente";

} else {
    echo "Error";
    
}

?>