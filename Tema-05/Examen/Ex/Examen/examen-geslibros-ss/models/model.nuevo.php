<?php

    /*
        Model Nuevo
    */


    $conexion = new Libros();

    $autores = $conexion->getAutores();

    $editoriales = $conexion->getEditoriales();
    
?>