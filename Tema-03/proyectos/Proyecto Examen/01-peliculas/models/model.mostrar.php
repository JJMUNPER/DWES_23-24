<?php

/*

    Modelo: model.mostrar.PHP

    - Carga los datos
    - Recibo por GET indice de la película que se desea mostrar

*/



$expresion = $_GET['id'];

$generos = getGeneros();
$peliculas = getPeliculas();
$paises = getPaises();

// $pelicula = $peliculas[$indice];

$indice_mostrar = buscar_en_tabla($peliculas, 'id', $expresion);

if ($indice_mostrar !== false) {

    $pelicula = $peliculas[$indice_mostrar];



} else {
    echo 'ERROR: Película no encontrado';
    exit();
}





?>