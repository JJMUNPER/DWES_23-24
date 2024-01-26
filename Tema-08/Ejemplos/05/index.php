<?php

/**
 * Ejemplo 
 * 
 * 
 */

# Abrir archivo

#apertura
$fichero = "files/ejemplo.txt";
$cadena = fopen($fichero, 'rb');

while (! feof($fp)){
    $linea = fgets($fp); # Lee una línea completa del fichero

    echo $linea;
    echo "<BR>";
}

fclose($fp);


?>