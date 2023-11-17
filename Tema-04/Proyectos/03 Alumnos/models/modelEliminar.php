<?php

/*
Modelo: modelEliminar.php
Descripción: Elimina un elemento de la tabla

Método GET:
        - id: Identificador del elemento a eliminar
*/

$asignaturas = ArrayAlumnos::getAsignaturas();
$cursos = ArrayAlumnos::getCursos();

$alumnos = new ArrayAlumnos();
$alumnos->getAlumnos();

//Obtener indice alumno
$indice= $_GET['id'];



$alumnos -> delete ( $indice );

$notificacion ="Borrado correctamente";
?>