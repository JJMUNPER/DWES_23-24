<?php

$generos =getGeneros();
$peliculas =getPeliculas();

$registro = [
    "id"=> nuevo_id($peliculas),
    "titulo" => $_POST["titulo"],
    "director" => $_POST["director"],
    "nacionalidad" => $_POST["nacionalidad"],
    "generos" => $_POST["generos"],
    "año"=> $_POST["año"]
];

$peliculas[]= $registro;

?>