<?php
/*
        Modelo: modelBuscar.php
        Descripción: Filtra los libros a partir de la expresion

        Método GET:
            - expresion: prompt o expresion de búsqueda
    */

   #cargo la expresion de busqueda

   $expresion = $_GET['expresion'];

   # Filtrar la tabla a partir de esa expresión

   // Creo un array vacio donde cargaré las filas que cumpplen
   // con la expresion de busqueda

   $aux=[];

   foreach($libros as $libro){
    if(array_search($expresion, $libro, false)){
        $aux[]=$libro;        
    }
}

    #Validar la busqueda

    if (!empty($aux)){
        $libros =$aux;       
   }
    


?>