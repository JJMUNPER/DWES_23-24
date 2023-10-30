<?php

    /*

        Modelo: model.eliminar.php
        Descripcion: elimina un elemento de la  tabla

        Método GET:
                    - id del libro que quiero eliminar

    */

    $id = $_GET['id'];



    $indice_eliminar = buscar_en_tabla($libros, 'id', $id);

    // comparación estricta para distinguer el false del 0
    if ($indice_eliminar !== false) {
        // elimino el libro seleccionado
        unset ($libros[$indice_eliminar]);

        // reconstruyo el array 
        $libros = array_values($libros);

    }  else { 
        echo 'ERROR: libro  no encontrado';
        exit();
    }

   

    
    

?>