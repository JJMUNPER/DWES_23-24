<?php

    /*  
        model.index.php

        Mostrar contenido de la tabla fp.alumnos

        Mostrará la tabla como array de objetos
    */

    //(8===D--)

    #conexion
    
    $conexion = new Libros();

    #Datos

    $libros = $conexion->getLibros();



?>