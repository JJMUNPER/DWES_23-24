<?php

    /*

        Modelo Principal index

    */

    # Ejecuto el constructor de la clase conexion
    //Conecto a la base de datos Fp?
    $conexion = new Alumnos();

    #Extraigo los valores para generar dinámicamente el select de cursos
    $cursos = $conexion->getCursos();

  

?>