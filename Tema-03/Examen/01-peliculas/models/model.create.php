<?php

/*

    model.create.PHP

    - Añade un elemento a la tabla 

*/

$generos = getGeneros();
$peliculas = getPeliculas();

$registro = [
    'id' => nuevo_id($peliculas),
    'tiulo' => $_POST['titulo'],
    'pais' => nuevo_pais($peliculas),
    'director' => $_POST['director'],
    'generos' => $_POST['generos'],
    'año' => $_POST['año']
];

$peliculas[] = $registro;
?>