<?php

/**
 * Ejemplo 6
 * 
 * 
 */

# Abrir archivo
$fichero = "files/datos.txt";

if (is_file($fichero)){
 
    echo 'Es un fichero';
    echo '<BR>';
    echo 'Tamaño Fichero' . filesize($fichero). 'Bytes';
    echo '<BR>';
    echo 'Fecha: ' . filemtime($fichero);
}
echo '<BR>';

if (is_dir('files')){
    echo 'Files'. ' Es una carpeta';
}




?>