<?php
/**
 * Modelo:model.editar.php 
 * Descripcion: edita los detalles de un alumno
 */

 //Cargamos los alumnos
$asignaturas = ArrayAlumnos::getAsignaturas();
$cursos = ArrayAlumnos::getCursos();
//creamos un objeto de la calse Array alumnos
$alumnos = new ArrayAlumnos();
//Cargo datos
$alumnos->getAlumnos();

//obtener indice del articulo que voy a editar
$indice = $_GET['id'];

$alumno = $alumnos->getAlumnos()[$indice];

// var_dump($articulo);
// exit;


$notificacion =" Editado correctamente";


?>
