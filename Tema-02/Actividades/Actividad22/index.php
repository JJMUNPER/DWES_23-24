<?php

#Autor: Juan Jesus Muñoz Perez
#Curso: 2ºDaw

/**
 * Actividad 2.2 - Tipos de conversión
 * 
 */


 #Usando val

 $num=77;

 $valorInt=intval($num);
 echo "Valor como int: ".$valorInt."\n";

 $valorBool=boolval($num);
 echo "Valor como bool: ".$valorBool."\n";

$valorString=strval($num);
echo "Valor como String: ".$valorString."\n";

$valorFloat=floatval($num);
echo "Valor como Float: ".$valorFloat."\n";

# Usando Settype ( con esta conversión no es necesario asignarle variable al resultado )

$var=16;

settype($var, "int");
echo "Valor como int: ".$var."\n";

settype($var, "bool");
echo "Valor como bool: ".$var."\n";

settype($var, "string");
echo "Valor como string: ".$var."\n";

settype($var, "float");
echo "Valor como float: ".$var."\n";

# Haciendo la conversión de forma implicita

$var2=66;

$val1=(int)$var2;
echo "Valor como int: ".$val1."\n";

$val2=(bool)$var2;
echo "Valor como bool: ".$val2."\n";

$val3=(string)$var2;
echo "Valor como string: ".$val3."\n";

$val4=(float)$var2;
echo "valor como float: ".$val4."\n";




?>