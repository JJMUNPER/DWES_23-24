<?php

/*

    Modelo: model.update.php
    Descripcion: actualiza los detalles de un  artículo

    Método POST:
                - id
                - descripcion
                - modelo
                - marca
                - categorías
                - unidades
                - precio

    Método GET:
                - indice -> índice  del articulo que quiero editar

*/


//Cargamos la tabla de alumnos con cursos y asignaturas
$cursos = ArrayAlumnos::getCursos();
$asignaturas = ArrayAlumnos::getAsignaturas();

//creamos un objeto de la calse Array alumnos
$alumnos = new ArrayAlumnos();

//Cargo datos
$alumnos->getAlumnos();

//obtener id del articulo que voy a editar
$id = $_GET['id'];


// Detalles del alumno seleccionado que están en el formulario en view.editar.php
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$fecha_nacimiento = date('d/m/Y', strtotime($fecha_nacimiento));
$curso = $_POST['curso'];
$asignaturasAlumno = $_POST['asignaturas'];

// Creo el objeto que modificaré con los setter y las igualo con las que tiene el artículo al darle click a editar
$alumno = new Alumno(
    $nombre,
    $apellidos,
    $email,
    $fecha_nacimiento,
    $curso,
    $asignaturasAlumno
);

//Añadimos el artículo
$alumnos->update($id, $alumno);

// Generar notificación
$notificacion = "Alumno editado correctamente";
?>