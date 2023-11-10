<?php

    /*

        model.create.PHP

        - Añade un elemento a la tabla 

    */


    $generos = getGeneros();
    
    $peliculas = getPeliculas();
    $paises = getPaises();

    $registro = [
            'id' => nuevo_id($peliculas),
            'tiulo' => $_POST['titulo'],
            'director' => $_POST['director'],
            'nacionalidad' => $_POST['nacionalidad'],
            'generos' => $_POST['generos'],
            'año' => $_POST['año']
    ];
    
    $peliculas[] = $registro;

   

?>