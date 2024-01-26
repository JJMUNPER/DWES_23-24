<?php

/**
 * Ejemplo 7
 * 
 * 
 */

# Abrir archivo
$fichero = "files/datos.txt";

$datos_archivo = stat($fichero);

print_r($datos_archivo);




?>