<?php

/**
 * Ejercicio 1: Conversiones de datos en expresiones.
 */


 $var1=6;
 $var2="8 Hola Mundo";

 $multiplica=$var1*$var2;
 var_dump($multiplica);
 echo "<br>";

 $suma=$var1+$var2;
 var_dump($suma);
 echo "<br>";

 $var3=9.81;
 $sumaFloat=$var1+$var3;
 var_dump($sumaFloat);
 echo "<br>";

 $concatenacion=$var1 . $var2;
 echo ($concatenacion);
 echo "<br>";

 $var4=false;
 $sumaBool=$var1+$var4;
 var_dump($sumaBool);
 echo "<br>"

?>