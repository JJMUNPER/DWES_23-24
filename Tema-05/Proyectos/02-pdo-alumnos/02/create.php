<?php

    /*

        Controlador: create.php
        Descripción: permite añadir a la tabla alumno de la bbdd fp un nuevo alumno
        
    */

    #Cargamos configuracion
    include 'config/db.php';


    # Librería
    include 'class/class.conexion.php';
    include 'class/class.alumno.php';
    include 'class/class.alumnos.php';

    # Model
    include 'models/model.create.php';


    # Redirecciono controlador principal
    header("location: index.php");
    

?>