<?php

class Album extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render()
    {

        # inicio o continuo sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['main']))) {
            $_SESSION['notify'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'index');
        } else {

            if (isset($_SESSION['notify'])) {
                $this->view->mensaje = $_SESSION['notify'];
                unset($_SESSION['notify']);
            }


            # Creo la propiedad title de la vista
            $this->view->title = "Home - Panel Control Album";

            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->albumes = $this->model->get();

            $this->view->render('album/main/index');
        }

    }

    function new()
    {

        # iniciar o continuar  sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {

            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['notify'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Crear un objeto album vacio
            $this->view->album = new classAlbum();

            # Comprobar si vuelvo de  un registro no validado
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Autorrellenar formulario con los detalles del  album
                $this->view->album = unserialize($_SESSION['album']);

                # Recupero array errores  específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['album']);
                unset($_SESSION['errores']);
            }

            # etiqueta title de la vista
            $this->view->title = "Añadir - Gestión Album";

            #  obtener los cursos  para generar dinámicamente lista cursos
            //$this->view->cursos = $this->model->getCursos();

            # cargo la vista con el formulario nuevo album
            $this->view->render('album/new/index');
        }
    }

    function create($param = [])
    {

        # Iniciar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['notify'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # 1. Seguridad. Saneamos los  datos del formulario
            $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            # 2. Creamos album con los datos saneados
            $album = new classAlbum(
                null,           #Id
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                null,           #num_fotos
                null,           #num_visitas
                $carpeta
            );

            # 3. Validación
            $errores = [];

            // Titulo Album
            if (empty($titulo)) {
                $errores['titulo'] = 'Campo obligatorio';
            } #Limitacion titulo album a 100 caracteres max.
            else if (mb_strlen($titulo) > 100) {
                $errores['titulo'] = 'Nombre superior a 100 caracteres';
            }

            // Descripcion
            if (empty($descripcion)) {
                $errores['descripcion'] = 'El campo descripcion es  obligatorio';
            }

            // Autor
            if (empty($autor)) {
                $errores['autor'] = 'El campo autor es  obligatorio';
            }

            // Fecha
            if (empty($fecha)) {
                $errores['fecha'] = 'El campo fecha es  obligatorio';
            } else if (!$this->model->validateFecha($fecha)){
                $errores['fecha'] = 'Formato no valido';
            }

            // Luegar
            if (empty($lugar)) {
                $errores['lugar'] = 'El campo lugar es  obligatorio';
            }

            // Categoria
            if (empty($categoria)) {
                $errores['categoria'] = 'El campo categoria es  obligatorio';
            }

            // Etiquetas. No obligatorio ///

            // Carpeta
            if (empty($carpeta)) {
                $errores['carpeta'] = 'El campo carpeta es obligatorio';
            } #Sin espacios en blanco
            else if (strpos($carpeta, " ") !== false) {
                $errores['carpeta'] = "No se permiten espacios en blanco";
            }



            # 4. Comprobar  validación

            if (!empty($errores)) {
                # errores de validación
                // variables sesión no admiten objetos
                $_SESSION['album'] = serialize($album);
                $_SESSION['error'] = 'Formulario no ha sido validado';
                $_SESSION['errores'] = $errores;

                # redireccionamos a new
                header('location:' . URL . 'album/new');


            } else {

                $this->view->title ="Tabla Albumes";

                # Añadir registro a la tabla
                $this->model->create($album);

                # Mensaje
                $_SESSION['notify'] = "Album creado correctamente";

                # Redirigimos al main de alumnos
                header('location:' . URL . 'album');

            }

        }
    }

    function edit($param = [])
    {

        # iniciamos sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['notify'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # obtengo el id del album que voy a editar
            // album/edit/4
            # asigno id a una propiedad de la vista

            //$this->view->id = $param[0];
            $id = $param[0];
            $this->view->id = $id;

            # title
            $this->view->title = "Editar - Panel de control Albun";

            # obtener objeto de la clase album
            $this->view->album = $this->model->getAlbum($id);//getAlbum($this->view->id);

            # Comprobar si el formulario viene de una no validación
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Autorrellenar formulario con los detalles del  album
                $this->view->album = unserialize($_SESSION['album']);

                # Recupero array errores  específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['album']);
                unset($_SESSION['errores']);
            }

            # cargo la vista
            $this->view->render('album/edit/index');

        }
    }

    public function update($param = [])
    {

        # iniciar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['notify'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # 1. Saneamos datos del formulario FILTER_SANITIZE
            $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            # 2. Creamos el objeto album a partir de  los datos saneados del  formuario
            $album = new classAlbum(
                null,           #Id
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                null,           #num_fotos
                null,           #num_visitas
                $carpeta
            );

            # Cargo id del album que voya a actualizar
            $id = $param[0];

            # Obtengo el  objeto album original
            $album_orig = $this->model->getAlbum($id);

            # 3. Validación
            // Sólo si es necesario
            // Sólo en caso de modificación del campo

            $errores = [];

            //Validar titulo
            if (strcmp($titulo, $album_orig->titulo) !== 0) {
                // título obligatorio y menor que 100
                if (empty($titulo)) {
                    $errores["titulo"] = "Campo obligatorio.";
                } else if (strlen($titulo) > 100) {
                    $errores["titulo"] = "Nombre superior a 100 caracteres.";
                }
            }

            //Validar apellidos
            if (strcmp($album_orig->descripcion, $descripcion) !== 0) {
                if (empty($descripcion)) {
                    $errores['descripcion'] = 'El campo titulo es  obligatorio';
                }
            }

            ///Validar autor
            if (strcmp($album_orig->autor, $autor) !== 0) {
                if (empty($autor)) {
                    $errores['autor'] = 'El campo autor es  obligatorio';
                }
            }

            //Validar fecha
            if (strcmp($album_orig->fecha, $fecha) !== 0) {
                if (empty($fecha)) {
                    $errores['fecha'] = 'El campo fecha es  obligatorio';
                } else if (!$this->model->validateFecha($fecha)){
                    $errores['fecha'] = 'Formato no valido';
                }
            }

            //Validar lugar
            if (strcmp($album_orig->lugar, $lugar) !== 0) {
                if (empty($lugar)) {
                    $errores['lugar'] = 'El campo fecha es  obligatorio';
                }
            }

            //Validar categoria
            if (strcmp($album_orig->categoria, $categoria) !== 0) {
                if (empty($categoria)) {
                    $errores['categoria'] = 'El campo categoria es  obligatorio';
                }
            }

            //ETIQUETAS ///

            //Validar carpeta
            if (strcmp($album_orig->carpeta, $carpeta) !== 0) {
                if (empty($carpeta)) {
                    $errores['carpeta'] = 'El campo carpeta es  obligatorio';
                } #Sin espacion en blanco
                elseif (strpos($carpeta, " ") !== false) {
                    $errores['carpeta'] = "No se permiten espacios en blanco";
                }
            }

            # 4. Comprobar  validación

            if (!empty($errores)) {
                # errores de validación
                // variables sesión no admiten objetos
                $_SESSION['album'] = serialize($album);
                $_SESSION['error'] = 'Formulario no ha sido validado';
                $_SESSION['errores'] = $errores;

                # redireccionamos a new
                header('location:' . URL . 'album/edit/' . $id);


            } else {

                # Actualizo registro
                //$this->model->update($param[0], $album);//($id, $edit_album, $album_orig);
                $this->view->title = "Tabla albumes";
                //Creo variable carpeta de origen para poder cambiarla
                $carOrig = $album_orig->carpeta;
                $this -> model -> update($id, $album, $carOrig); //album_orig??
                
                # Uso rename() para cambiar el nombre de un directorio
                //rename("imagenes/" . $album_orig->carpeta, "imagenes/" . $album->carpeta);


                # Mensaje
                $_SESSION['notify'] = "Album actualizado correctamente";

                # Redirigimos al main de alumnos
                header('location:' . URL . 'album');

            }

        }
    }

    public function order($param = [])
    {

        # inicio o continúo sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['order']))) {
            $_SESSION['notify'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Obtengo criterio de ordenación
            $criterio = $param[0];

            # Creo la propiedad title de la vista
            $this->view->title = "Ordenar - Panel Control Album";

            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->albumes = $this->model->order($criterio);

            # Cargo la vista principal de album
            $this->view->render('album/main/index');
        }
    }

    public function filter($param = [])
    {

        # inicio o continúo sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['filter']))) {
            $_SESSION['notify'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Obtengo expresión de búsqueda
            $expresion = $_GET['expresion'];

            # Creo la propiedad title de la vista
            $this->view->title = "Buscar - Panel Control Album";

            # Filtro a partir de la  expresión
            $this->view->albumes = $this->model->filter($expresion);

            # Cargo la vista principal de album
            $this->view->render('album/main/index');
        }
    }

    public function delete($param = [])
    {

        # inicar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['delete']))) {
            $_SESSION['notify'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # obtenemos id del  album
            $id = $param[0];
            $carpetaAlbum = $this->model->getAlbum($id);

            # eliminar album
            //$this->model->delete($id);
            //$this->model->deleteCarpeta($carpetaAlbum->carpeta);
            $this->model->delete($id, $carpetaAlbum->carpeta);

            # generar mensaje
            $_SESSION['notify'] = 'Alumno eliminado correctamente';

            # redirecciono al main de alumnos
            header('location:' . URL . 'album');
        }
    }

    # Creamos la funcion agregar

    public function agregar($param = []){
        # inicio o continuo sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['agregar']))) {
            $_SESSION['notify'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Comprobar si vuelvo de  un registro no validado
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Recupero array errores  específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
            }

            # etiqueta title de la vista
            $this->view->title = "Subir Archivos - Gestión Album";
            //$this->view->id = $param[0];
            //$this->view->album = $this->model->getAlbum($this->view->id);
            $id = $param[0];
            $this->view->id = $id; //isset($id) ? $id : null;


            # cargo la vista con el formulario nuevo alumno
            $this->view->render('album/agregar/index');
        }
    }

    public function upload($param = []) {
        # Iniciar o continuar  sesión
        session_start();
    
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "El usuario debe autentificarse";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['upload']))) {
            $_SESSION['notify'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {
            if (isset($_SESSION['notify'])) {
                $this->view->mensaje = $_SESSION['notify'];
                unset($_SESSION['notify']);
            }
    
            $id = $param[0];
            $carpetaAlbum = $this->model->getAlbum($id);
    
            // Validación y subida de archivos
            $this->model->uploadFicheros($_FILES['ficheros'], $carpetaAlbum->carpeta);
    
            // Verificar si hay errores
            if (isset($_SESSION['error'])) {
                // Pasar errores a la vista
                $this->view->error = $_SESSION['error'];
                unset($_SESSION['error']);
                
                // Renderizar el formulario nuevamente
                $this->agregar($param);
            } else {
                // Actualizamos en la base de datos el número de fotos
                $numImagenes = count(glob('imagenes/'.$carpetaAlbum->carpeta."/*"));
                $this->model->totalImagenes($id,$numImagenes);

                // Si no hay errores, redirigir al usuario
                header('location:' . URL . 'album');
            }
        }
    }

    /**
     * Funcion para mostrar los detalles de un album
     *
     * @param array $param array contiene el ID del album a mostrar como parametro.
     * @throws Exception Si el usuario no está autenticado o carece de privilegios.
     * @return void
     */
    public function show($param = []) {
        // Iniciar o continuar sesión
        session_start();
    
        // Comprobar si el usuario está autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autenticarse";
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['album']['show'])) {
            $_SESSION['notify'] = "No tienes privilegios para realizar dicha operación";
            header('location:' . URL . 'album');
        } else {
            $id = $param[0];
            $album = $this->model->getAlbum($id); 
            $this->view->title = "Detalles del álbum";
            $this->view->nombreAlbum = $album->carpeta;
    
            $this->view->album = $this->model->getAlbum($id);
            
            // Imagenes (Lista de imagenes)
            $ruta = 'imagenes/' . $album->carpeta . '/';
            $imagenes = array_diff(scandir($ruta), array('..', '.')); 
    
            //Visitas del album
            $this->model->visitaNueva($id);

            // Pasamos las imagenes para la vista 
            $this->view->imagenesAlbum = $imagenes;
            $this->view->render("album/show/index");
        }
    }
}

