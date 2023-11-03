<?php

$indice = $_GET['indice'];

$generos = getGeneros();

$peliculas = getPeliculas();

$peliculas = eliminar ($peliculas, $indice);

?>