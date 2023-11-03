<?php

$expresion = $_GET["expresion"];

$generos = getGeneros();

$peliculas = getPeliculas();

$peliculas = filtrar($peliculas, $expresion);

?>