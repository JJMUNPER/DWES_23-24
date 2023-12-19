<?php

    /*  
        model.index.php

        Mostrar contenido de la tabla fp.alumnos

        Mostrará la tabla como array de objetos
    */


    #Conexión a la abase de datos

    $conexion = new Libros();

    #Cargamos los datos

    $libros = $conexion->getLibros();



?>