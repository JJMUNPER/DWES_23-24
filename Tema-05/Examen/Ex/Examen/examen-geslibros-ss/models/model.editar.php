<?php

    /*
        Muestra formulario para crear nuevo libro

        Necesito obtener las editoriales y los autores para generación dinámica del combox 
        para autores y editoriales
    */

    # tomamos por GET el id  a editar  (8===D--)
    $id_editar = $_GET['id'];


    // conexion con la BBDD
    $conexion = new Libros();

    # extraigo los valores  
    $libros = $conexion->getLibros(); 

    #editar
    $libro = $conexion->getLibros($id_editar);

   
    
?>