<?php

/**
 * Ejemplo 4
 * 
 * Crear archivo texto plano
 */

#Lectura y modificacion archivo completo

#apertura
$fichero = "ejemplo.txt";
$cadena = file_get_contents($fichero);

var_dump($cadena);

$cadena = $cadena . "\n" . "Nueva Línea";

file_put_contents($fichero, $cadena);


?>