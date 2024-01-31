<?php

<<<<<<< HEAD
    class Errores extends Controller {

        function __construct() {

            parent ::__construct();
            $this->view->mensaje = "Error al cargar el recurso";
            $this->view->render('error/index');
        }

      

    }

=======
class Errores extends Controller
{

    function __construct()
    {

        parent::__construct();
        $this->view->mensaje = "Error al cargar el recurso";
        $this->view->render('error/index');
    }



}

>>>>>>> 5b10e65174ce6aef1664ce77c4d88b9b790ba63f
?>