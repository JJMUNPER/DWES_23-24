<?php

    /*

        Modelo: model.mostrar.PHP

        - Carga los datos
        - Recibo por GET indice de la película que se desea mostrar

    */


    
    $expresion = $_GET['indice'];
    
    $generos = getGeneros();
    $peliculas = getPeliculas();
    $paises = getPaises();
    
    $pelicula = $peliculas[$indice];
   
    
    

?>