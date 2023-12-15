<?php

    class Alumno Extends Controller {

        function __construct() {
            
            parent ::__construct();
            
            
        }

        function render() {
            
            #Creo la propiedad alumnos dentro de la vista
            #Del modelo asignado al controlador ejecuto el método get();
            $this->view->alumnos = $this->model->get();

            $this->view->render('alumno/main/index');
        }

        function new(){

            $this->view->render('alumno/new/index');
        }

        function show($param =[]){

        }
    }

?>