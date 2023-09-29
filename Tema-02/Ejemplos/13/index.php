<?php

/**
 * Funcion in_null()
 * Verdadero:
 *  -Variable no definida
 *  -Variable asignada el valor null
 * Falso:
 *  -asignar el valor 0
 *  -asignar cualquier valor entero
 *  -asignar cadena vacia ""
 *  -asignar array vacio []
 */

 //Casos

 $var=0;
 var_dump(is_null($var));

 echo"<BR>";

 //Variable definida asignando valor null

 $var=null;
 var_dump(is_null($var));

 echo"<BR>";

 //variable eliminada
 unset($var);
 var_dump(is_null($var));

 echo"<BR>"


?>