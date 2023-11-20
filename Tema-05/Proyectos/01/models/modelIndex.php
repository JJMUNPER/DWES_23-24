<?php

/**
 * Modelo:modelIndex.php 
 * Descripcion: crear un array con los detalles de los 
 */
setlocale(LC_MONETARY, "es_ES");

//Conecto con la base de datos
$db = new Fp();

//Objeto result con los detalles del alumno//$alumno es un objeto de la clase mysqli
$alumnos = $db -> getAlumnos();



?>