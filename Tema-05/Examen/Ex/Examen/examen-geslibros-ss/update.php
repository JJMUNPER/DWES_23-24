<?php

   /*
        create.php

        Controlador que permite añadir un nuevo libro a la tabla libros de geslibros

   */

   #COnfig
   include 'config/config.php';

   #clases
   include 'class/class.conexion.php';
   include 'class/class.libros.php';
   include 'class/class.libro.php';
   

   #model
   include 'models/model.update.php';

   #vista
   header ('location: index.php');
?>