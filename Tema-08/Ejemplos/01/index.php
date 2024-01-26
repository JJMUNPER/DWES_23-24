<?php

/**
 * Ejemplo 1
 * 
 * Crear archivo texto plano
 */

 #Crear archivo para escritura
 #Si no existe lo crea
 $fichero = "ejmplo.txt";
 $fp = fopen($fichero, 'wb');

 #escritura
 fwrite($fp, 'Mi primer fichero texto plano.PHP');

 #cierre
 fclose($fp);

 echo "fichero creado con éxito";

?>