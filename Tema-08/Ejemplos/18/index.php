<?php

/**
 * Para usar ZipArchive es necesario ir a php.ini y 
 * habiliatar extension=zip puesto que esta comentado
 */

//Creamos objeto de la clase ZipArchive
$zip = new ZipArchive();

//Abrir archivo zip
if ($zip->open('files.zip', ZIPARCHIVE::CREATE) === TRUE) {

    //Agregamos los ficheros manualmente uno por uno
    $zip->addFile('files/archivo01.php', 'files/documento01.php');
    $zip->addFile('files/archivo02.php');
    $zip->addFile('files/archivo03.php', 'files/archivo03.php');

    //proceso finalizado
    $zip->close();
    echo "Se ha comprimido correctamente";

} else {
    echo "Error";
    
}


?>