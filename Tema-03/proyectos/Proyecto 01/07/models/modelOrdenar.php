<?php
/*
        Modelo: modelOrdenar.php
        Descripción: muestra los libros a partir de un critierio

        Método GET:
            - criterio: titulo, autor, genero, precio
    */

    // Extraemos el valor del id a través del metodo get
    $criterio=$_GET['criterio'];
    
   

    //Validar criterio

    if (!in_array($criterio,array_keys($libros[0]))){
        echo"Error: Criterio de ordenacion inexistente";
        exit();
    }

    // Funcion array_multisort 

    array_multisort($aux, SORT_ASC, $libros);

     #ordenar tabla libros

    //cargo un array todos los valores del criterio de ordenación

    $aux = array_column($libros, $criterio);

    


?>