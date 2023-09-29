<?php

/**
 * Funcion isset()
 * Falso
 *  -Variable no definida
 *  -Variable asignada el valor null
 * Verdadero
 *  -asignar el valor 0
 *  -asignar cualquier valor entero
 *  -asignar cadena vacia ""
 *  -asignar array vacio []
 */

 //Casos


 var_dump(isset($var));

 echo"<BR>";

 //Caso II

 $var=null;
 var_dump(isset($var));

 echo"<BR>";

 //CasoIII

 $var=0;
 var_dump(isset($var));

 echo"<BR>";

 //caso IV

 $var=[];
 var_dump(isset($var));

 echo"<BR>";

//CasoV
 $var="";
 var_dump(isset($var));

 echo"<BR>";



?>