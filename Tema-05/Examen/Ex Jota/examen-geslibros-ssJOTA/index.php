<?php

    /*

        index.php

        Controlador que permite realizar una consulta de libros en geslibros y mostrarlos en
        una vista a partir del diseño establecido

    */

    #Config
    include 'config/config.php';

    #Clases
    include 'class/class.conexion.php';
    include 'class/class.libros.php';
    include 'class/class.libro.php';

    #modelo
    include 'models/model.index.php';

    #vista
    include 'views/view.index.php';

?>