<?php

/**
 * Descripcion: añade un nuevo articulo a la tabla
 * 
 * Metodo POST
 *              -id
 *              -descripcion
 *              -modelo
 *              -precio
 *              -marca-indice
 *              -categorias-array
 *              -unidades
 * 
 */
#cargamos array marcas categorias
$cursos = ArrayAlumnos::getCursos();
$asignaturas = ArrayAlumnos::getAsignaturas();


#cargo alumnos
$alumnos =new ArrayAlumnos();
$alumnos -> getAlumnos();

#Cargo en variables los detalles del alumno
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$fecha_nacimiento = date('d/m/Y', strtotime($fecha_nacimiento));
$curso = $_POST['curso'];
$asignaturasAlumno = $_POST['asignaturas'];


#validacion

#creo un objeto clase articulo a partir de los detalles
#del formulario

$alumno = new Alumno(
    $id,
    $nombre,
    $apellidos,
    $email,
    $fecha_nacimiento,
    $curso,
    $asignaturasAlumno
    
);


#añadimos el articulo a la tabla

$alumnos -> create($alumno);

#genero notificacion
$notificacion = " Alumno creado con exito";

?>