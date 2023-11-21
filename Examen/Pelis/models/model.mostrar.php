<?php

/*

        Modelo: model.mostrar.PHP

        - Carga los datos
        - Recibo por GET indice de la película que se desea mostrar

    */



    $peliculas = getPeliculas();
    $paises = getPaises();
    $generos = getGeneros();
    
    if (isset($_GET['indice'])) {
        $indicePelicula = $_GET['indice'];
        $peliculaSeleccionada = isset($peliculas[$indicePelicula]) ? $peliculas[$indicePelicula] : null;
    
        if ($peliculaSeleccionada) {
            $pelicula = [
                'id' => $peliculaSeleccionada['id'],
                'titulo' => $peliculaSeleccionada['titulo'],
                'pais' => isset($paises[$peliculaSeleccionada['pais']]) ? $paises[$peliculaSeleccionada['pais']] : '',
                'director' => $peliculaSeleccionada['director'],
                'generos' => mostrarGeneros($generos, $peliculaSeleccionada['generos']),
                'año' => $peliculaSeleccionada['año']
            ];
    
            include "views/view.mostrar.php";
        } else {
            // Manejar el caso donde no se encuentra la película
        }
    } else {
        // Manejar el caso donde no se proporciona un índice
    }
