<?php

    /*

        nuevo.php

        Controlador que permite acceder a geslibros, extraer la lista de Autores y Editoriales
        y mostrar el formulario que permitirá añadir nuevo libro.

    */

    #Cargamos constante
    include 'config/config.php';

    #Clases
    include 'class/class.conexion.php';
    include 'class/class.libro.php';
    include 'class/class.libros.php';

    #Modelos
    include 'models/model.editar.php';

    #Vista
    include 'views/view.editar.php'


?>