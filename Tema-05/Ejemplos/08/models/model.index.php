<?php

    /**
     * 
     * Modelo Principal index
     * 
     */

     # Creamos objeto de la clase curso

     $curso = new Curso();

     #Asignamos valores a las propiedades del objeto

     $curso->nombre = "Primero Desarrollo Aplicaciones Multiplataformas";
     $curso->ciclo = "Desarrollo Aplicaciones Multiplataforma";
     $curso->nombreCorto = "1DAM";
     $curso->nivel = "1";

     #Conectamos con la base de datos
     $fp = new Fp();
     $fp->inser_curso($curso);

     echo "curso añadido correctamente";


?>