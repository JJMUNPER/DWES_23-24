<?php

/**
 * Modelo:modelIndex.php 
 * Descripcion: genera en array de objetos de artículos
 */
// setlocale(LC_MONETARY, "es_ES");

#Cargamos los arrays a partir de los metodos estaticos de la clase
#ArrayAlumnoss. 
$cursos = ArrayAlumnos::getCursos();
$asignaturas = ArrayAlumnos::getAsignaturas();

#Creamos un objeto de la clase ArrayAlumnos
$alumnos = new ArrayAlumnos();
#Cargo los datos
$alumnos->getAlumnos();


//Para probar lo hecho
// print_r($alumnos);
// exit;


?>