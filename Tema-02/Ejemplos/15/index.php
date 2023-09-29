<?php

/**
 * Funcion empty()
 * Verdadero
 *  -Variable no definida sin generar aviso
 *  -Variable asignada el valor null
 *  -asignar valor 0
 *  -asignar un array[]
 *  -asignar false
 *  -asignar ""
 * Falso
 *  -asignar true
 *  
 */

 //Casos


 var_dump(empty($var));

 echo"<BR>";

 //Caso II

 $var=null;
 var_dump(empty($var));

 echo"<BR>";

 //CasoIII

 $var=0;
 var_dump(empty($var));

 echo"<BR>";

 //caso IV

 $var=[];
 var_dump(empty($var));

 echo"<BR>";

//CasoV
 $var=false;
 var_dump(empty($var));

 echo"<BR>";

//Caso VI
 $var="";
 var_dump(empty($var));

 echo"<BR>";

 //Caso VII

 $var="0";
 var_dump(empty($var));

 echo"<BR>";


?>