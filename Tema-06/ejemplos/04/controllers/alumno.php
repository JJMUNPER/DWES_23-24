<?php
    // Todos los controladores se crean a partir del controlador
    class Alumno Extends Controller {

        function __construct() {
            
            parent ::__construct();
            
            
        }
        // Render se ejecuta por defecto, es decir, se ejecuta cuando en la URL no hay un segundo parametro
        function render() {
            // Creo la propiedad alumnos dentro de la vista del modelo asignado al controlador, y ejecuto el modelo get(); 
            $this->view->alumnos = $this->model->get();
            
            // Cargara la vista alumno
            $this->view->render('alumno/main/index');
        }

        /**
         * Método new
         * Creamos un nuevo alumno
         */
        function new(){
            #etiqueta title de la vista
            $this->view->title="Añadir - Gestión Alumnos";

            #obtener los cursos para generar diámicamente lista cursos
            $this->view->cursos = $this->model->getCursos();

            #Cargo la vista con el formulario nuevo alumno
            $this->view->render('alumno/new/index');
        }
        /**
         * Método show
         * Muestra los detalles de un registro
         */
        function show($param = []){

        }
    }

?>