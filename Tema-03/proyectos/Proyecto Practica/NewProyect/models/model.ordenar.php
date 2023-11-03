<?php

$criterio = $_GET['criterio'];

$generos = getGeneros();

$peliculas =getPeliculas();

$peliculas = ordenar($peliculas, $criterio);

?>