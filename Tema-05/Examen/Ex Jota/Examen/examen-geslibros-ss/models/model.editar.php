<?php

    /*
        Muestra formulario para crear nuevo libro

        Necesito obtener las editoriales y los autores para generación dinámica del combox 
        para autores y editoriales
    */

    # tomamos por GET el id  a editar
    $id_editar = $_GET['id'];


    // conexion con la BBDD
    $conexion = new Libros();

    # extraigo los valores  
    $cursos = $conexion->getLibros();

    #editar
    $alumno = $conexion->readLibro();

   
    
?>