<?php

    /*

        Modelo Principal index

    */

    # Ejecuto el constructor de la clase conexion
    //Conecto a la base de datos Fp?
    $conexion = new Alumnos();

    #Extraigo los valores de los alumnos
    $alumnos = $conexion->getAlumnos();

  

?>