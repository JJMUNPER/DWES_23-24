<?php

    class Alumno Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            #Inicio o continuo sesion
            session_start();

            #Comprobar si existe mensaje
            if (isset($_SESSION['mensaje'])){
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            # Creo la propiedad title de la vista
            $this->view->title = "Home - Panel Control Alumnos";
            
            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->alumnos = $this->model->get();

            $this->view->render('alumno/main/index');
        }

        function new() {

            #Iniciar o continuar sesion
            session_start();

            #Creamos un objeto alumno vacio
            $this->view->alumno = new classAlumno();

            # Comprobar si vuelvo de un registro no valido
            if(isset($_SESSION['error'])){
                #Mensaje de error
                $this->view->error = $_SESSION['error'];

                #Autorellenar el formulario con los detalles del alumno
                $this->view->alumno = unserialize ($_SESSION['alumno']);

                #Recupero el arry errores específicos
                $this->view->errores = $_SESSION['errores'];

                #Elimino las variables de sesion
                unset($_SESSION['error']);
                unset($_SESSION['alumno']);
                unset($_SESSION['errores']);
            }

            # etiqueta title de la vista
            $this->view->title = "Añadir - Gestión Alumnos";

            #  obtener los cursos  para generar dinámicamente lista cursos
            $this->view->cursos = $this->model->getCursos();

            # cargo la vista con el formulario nuevo alumno
            $this->view->render('alumno/new/index');
        }

        function create ($param = []) {

            #Inciamos sesion 
            session_start();

            #1. Seguridad. Sanemaos los datos del formulario
        
            $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var ($_POST ['email'] ??='', FILTER_SANITIZE_EMAIL);
            $telefono = filter_var ($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $poblacion = filter_var ($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var ($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fechaNac = filter_var ($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_curso = filter_var ($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);

            #2. Creamos el alumno con los datos saneados


            # Cargamos los datos del formulario
            $alumno = new classAlumno(
                null,
                $nombre,
                $apellidos,
                $email,
                $telefono,
                null,
                $poblacion,
                null,
                null, 
                $dni,      
                $fechaNac,
                $id_curso
            );

            # 3.Validación

            $errores = [];

            //nombre: obligatorio
            if (empty($nombre)){
                $errores['nombre'] = 'El campo nombre es obligatorio';
            }

            //apellidos: obligatorio
            if (empty($nombre)){
                $errores['apellidos'] = 'El campo apellidos es obligatorio';
            }

            // FechaNac: obligatorio
            // $valores = explode ('/', $fechaNac);

            // if (empty($fechaNac)){
            //     $errores['fechaNac'] = 'Campo obligatorio';
            // } else if (!checkdate($valores[1], $valores[0], $valores[2])){
            //     $errores ['fechaNac'] = 'Fecha no válida';
            // }

            //email: obligatorio, formato válido y clave secundaria
            if (empty($email)){
                $errores['email'] = 'El campo email es obligatorio';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errores['email'] = 'Formato de email incorrecto';

            } else if (!$this->model->validateUniqueEmail($email)){
                $errores['email'] = 'Email existente';
            }

            //dni: obligatorio, formato válido y clave secundaria
            $options = [
                'options' => [
                    'regexp' => '/^(\d{8})([A-Za-z])$/'
                ]
                ];
            
            if (empty($dni)){
                $errores['dni'] = 'El campo DNI es obligatorio';
            } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)){
                $errores['dni'] = 'Formato DNI incorrecto';

            } else if (!$this->model->validateUniqueDNI($dni)){
                $errores['dni'] = 'DNI existente';
            }

            //id_curso: obligatorio, entero, existe

            if (empty($id_curso)){
                $errores['id_curso'] = 'Debe seleccionar un curso';
            } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)){
                $errores['id_curso'] = 'Curso no valido';

            } else if (!$this->model->validateCurso($id_curso)){
                $errores['id_curso'] = 'Curso no existente';
            }

            # 4. Comprobar validacion

            if (!empty($errores)){
                //errores de validacion
                //Variables de sesion no admite objetos
                $_SESSION['alumno'] = serialize($alumno);
                $_SESSION['error'] = "Formulario no ha sido validado";
                $_SESSION['errores'] = $errores;

                #Redireccionamos a new
                header ('location:' . URL. 'alumno/new');

            }else {
                //
            # Añadir registro a la tabla
            $this->model->create($alumno);

            #mensaje
            $_SESSION['mensaje'] = "Alumno creado correctamente";

            # Redirigimos al main de alumnos
            header('location:'.URL.'alumno');
            }
        }

        function edit($param = []) {

            # obtengo el id del alumno que voy a editar
            // alumno/edit/4

            $id = $param[0];

            # asigno id a una propiedad de la vista
            $this->view->id = $id;

            # title
            $this->view->title = "Editar - Panel de control Alumnos";

            # obtener objeto de la clase alumno
            $this->view->alumno = $this->model->read($id);

            # obtener los cursos
            $this->view->cursos = $this->model->getCursos();

            # cargo la vista
            $this->view->render('alumno/edit/index');



        }

        public function update($param = []) {

            # Cargo id del alumno
            $id = $param[0];

            # Con los detalles formulario creo objeto alumno
            $alumno = new classAlumno (

                null,
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['email'],
                $_POST['telefono'],
                null,
                $_POST['poblacion'],
                null,
                null, 
                $_POST['dni'],      
                $_POST['fechaNac'],
                $_POST['id_curso']

            );

            # Actualizo base  de datos
            $this->model->update($alumno, $id);

            # Cargo el controlador principal de alumno
            header('location:'. URL.'alumno');

        }

        public function order($param = []) {

            # Obtengo criterio de ordenación
            $criterio = $param[0];

            # Creo la propiedad title de la vista
            $this->view->title = "Ordenar - Panel Control Alumnos";
            
            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->alumnos = $this->model->order($criterio);

            # Cargo la vista principal de alumno
            $this->view->render('alumno/main/index');
        }

        public function filter($param = []) {

            # Obtengo expresión de búsqueda
            $expresion = $_GET['expresion'];

            # Creo la propiedad title de la vista
            $this->view->title = "Buscar - Panel Control Alumnos";
            
            # Filtro a partir de la  expresión
            $this->view->alumnos = $this->model->filter($expresion);

            # Cargo la vista principal de alumno
            $this->view->render('alumno/main/index');
        }
    }

?>