<?php

/*

Archivo: index.php
Ddescripción: Ejemplo - 07
Autor: Juan Jesus
Fecha: 26/09/2023


*/

$alumno = "Jota";

echo "El alumno es: ";
echo "<br>";
echo $alumno;

echo "<br>";

print "El alumno es: ";
echo "<br>";
print $alumno;

echo "<br>";

echo 123.55;
//Valores numericos sin comillas

echo "<br>";

print 77.66;

echo "<br>";

echo "Mi nombre es ","Jota";

echo "<br>";

//echo como print son funciones, la sintáxis de PHP admite el no uso de ()

print "Mi nombre es "."jota";

echo "<br>";

//Dos argumentos se convierten uno con el . que concatena

/** 
 * --Diferenecias entre echo y print--
 * 
 * El echo puede imprimir directamente valores numericos; no hace
 * falta ponerlo entre comillas.
 * 
 * El print tambien puede hacerlo.
 * 
 * El separador decimal es el punuto.
 * 
 * echo puede imprimir varias cadenas separadas por coma.
 * 
 * echo es una funcion, todo lo que se ponga despues de echo, y admite
 * varios parametros.
 * 
 * Textos grandes echo
 * 
 * Para usar un determinado formato, por ejemplo un valor monetario, se
 * usa el print, tambien cuando se le quiere dar un formateo.
 * 
 * echo admite varios parametros y print solo uno.
 */

?>