<?php

/*

        model.create.PHP

        - Añade un elemento a la tabla 

    */

    $peliculas = getPeliculas();
    $paises = getPaises();
    $generos = getGeneros();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Resto del código para procesar el formulario POST
    } else {
        include "views/view.nuevo.php";
    }
