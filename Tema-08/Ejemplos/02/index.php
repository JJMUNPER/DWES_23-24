<?php

/**
 * Ejemplo 1
 * 
 * Crear archivo texto plano
 */

#Crear archivo para escritura
#Si no existe lo crea si existe lo machaca

#apertura
$fichero = "ejemplo.txt";
$fp = fopen($fichero, 'ab');

#escritura
fwrite($fp, "\n");
fwrite($fp, 'Esta nueva línea');

#cierre
fclose($fp);

echo "fichero $fichero creado con éxito";

?>