<?php

    /*  
        model.index.php

        Mostrar contenido de la tabla fp.alumnos

        Mostrará la tabla como array de objetos
    */

    #conexion
    $conexion = new Libros();

    #Recogida datos tabla
    $libros = $conexion->getLibros();



?>