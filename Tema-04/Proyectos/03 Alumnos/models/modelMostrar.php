<?php

/**
 * 
 * Modelo: model.mostrar.php
 * Descripcion: muestra los detalles de un artículo sin edición
 * 
 * Metodo GET:
 *          - Id del alumno que quiero editar
 * 
 */



$cursos = ArrayAlumnos::getCursos();
$asignaturas = ArrayAlumnos::getAsignaturas();

$alumnos = new ArrayAlumnos();

$alumnos -> getAlumnos();

$indice = $_GET['id'];

$alumno = $alumnos->read($indice);


?>