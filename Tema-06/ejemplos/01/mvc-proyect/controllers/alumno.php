<?php

    class Alumno Extends Controller {

        function __construct() {
            
            parent ::__construct();
            
            
        }

        function render() {
            //Creacion de variables para que lo muestre en la vista
            $this->view->nombre ="Juan";
            $this -> view ->apellidos="Muñoz Perez";

            $this->view->render('alumno/main/index');
        }

        function new(){

            $this->view->render('alumno/new/index');
        }

        function show($param =[]){

        }
    }

?>