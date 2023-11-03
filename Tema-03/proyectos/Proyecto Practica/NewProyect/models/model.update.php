<?php

/**
 * 
 * model.update.php
 * 
 *      -Actualiza los datos
 *      -Recibo por GET los indices
 *      -Recibo por POST los datos
 * 
 */

$indice = $_GET['indice'];


$pelicula = [

    'id' => $_POST['id'],
    'titulo' => $_POST['titulo'],
    'director' => $_POST['director'],
    'nacionalidad' => $_POST['nacionalidad'],
    'generos' => $_POST['generos'],
    'año' => $_POST['año']

];


$generos = getGeneros();


$peliculas = getPeliculas();


$peliculas[$indice] = $pelicula;



?>