<?php

class Clientes extends Controller
{

    # Método principal. Muestra todos los clientes
    public function render($param = [])
    {
        //---------------------Validación/Autentificación/Gestion Usuarios------------------------------//

        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['main'])) {
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos al index, puesto que actualmente no tiene ningún privilegio
            header('location:' . URL . 'index');
        } else {
            # Si existe un mensaje lo mostramos
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            //--------------------------------------------------------//        

            # Propiedad title de la vista
            $this->view->title = "Tabla Clientes";

            #Añadimos cliente
            $this->view->clientes = $this->model->get();

            #Cargamos la vista
            $this->view->render("clientes/main/index");
        }
    }

    # Método nuevo. Muestra formulario añadir cliente
    public function nuevo($param = [])
    {
        //-------------------Validación/Autentificación/Gestion Usuarios-------------------------------------//        
        # Iniciamos o continuamos la sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['new'])) {
            // Mensaje usuario
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:' . URL . 'clientes');
        } else {
            # Creamos un objeto vacio
            $this->view->cliente = new classCliente();

            # Comprobamos si existen errores
            if (isset($_SESSION['error'])) {
                // Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->cliente = unserialize($_SESSION['cliente']);

                // Recuperamos el array con los errores
                $this->view->errores = $_SESSION['errores'];

                // Variables de sesion se eliminan
                unset($_SESSION['error']);
                unset($_SESSION['cliente']);
                unset($_SESSION['errores']);
            }




            $this->view->title = "Formulario cliente nuevo";
            $this->view->render("clientes/nuevo/index");
        }
        //--------------------------------------------------------------------//
    }

    # Método create. 
    # Permite añadir nuevo cliente a partir de los detalles del formuario
    public function create($param = [])
    {
        //-----------------------Validacion/Autentificación/Gestion usuario-------------------------------------//

        # 1. Inicio/continuación de sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['new'])) {
            // Mensaje para el usuario
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";
        } else {
            # 2. Saneamiento de los datos del formulario
            $apellidos = filter_var($_POST["apellidos"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $nombre = filter_var($_POST["nombre"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefono = filter_var($_POST["telefono"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

            # 3. Creamos el cliente, con los datos saneados
            $cliente = new classCliente(
                null,
                $apellidos,
                $nombre,
                $telefono,
                $ciudad,
                $dni,
                $email,
                null,
                null
            );

            # 4. Validación
            // Creamos el array de errores, donde iremos añadiendo contenido si se cumplen errores
            $errores = [];

            // Apellidos
            if (empty($apellidos)) {
                $errores['apellidos'] = "Campo obligatorio";
            } else if (strlen($apellidos) > 45) {
                $errores['apellidos'] = "Superaste el limite de caracteres";
            }

            // Nombre. Obligatorio
            if (empty($nombre)) {
                $errores['nombre'] = "Campo obligatorio";
            } else if (strlen($nombre) > 20) {
                $errores['nombre'] = "Superaste el limite de caracteres";
            }

            // Teléfono. No obligatorio
            $tel = [
                'options' => [
                    'regexp' => '/^[0-9]{9}$/'
                ]
            ];

            if (!empty($telefono) && !filter_var($telefono, FILTER_VALIDATE_REGEXP, $tel)) {
                $errores['telefono'] = "Debe ser numerico y tener 9 caracteres";
            }

            // Población
            if (empty($ciudad)) {
                $errores['ciudad'] = "Campo obligatorio";
            } else if (strlen($ciudad) > 20) {
                $errores['ciudad'] = "Superaste el limite de caracteres";
            }

            // Dni obligatorio con expresión regular
            $dniRegexp = [
                'options' => [
                    'regexp' => '/^[0-9]{8}[A-Z]$/'
                ]
            ];

            if (empty($dni)) {
                $errores['dni'] = "Campo obligatorio";
            } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $dniRegexp)) {
                $errores['dni'] = "Formato DNI incorrecto";
            } else if (!$this->model->validateUniqueDni($dni)) {
                $errores['dni'] = "El DNI introducido ya ha sido registrado";
            }

            // Email obligado 
            if (empty($email)) {
                $errores['email'] = "Campo obligatorio";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Formato Email no válido";
            } else if (!$this->model->validateUniqueEmail($email)) {
                $errores['email'] = "El correo electrónico introducido ya está registrado";
            }

            # 5. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                $_SESSION['cliente'] = serialize($cliente);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                // Redireccionamos nuevamente al formulario nuevo
                header('Location:' . URL . 'clientes/nuevo');
            } else {
                // Añadimos el registro a la BBDD
                $this->model->create($cliente);

                // Mensaje feedback cliente
                $_SESSION['mensaje'] = 'Cliente creado correctamente';

                // Redirigimos
                header("Location:" . URL . "clientes");
            }
        }

        //---------------------------------------------------------------------------//        
    }

    # Método delete. 
    # Permite la eliminación de un cliente
    public function delete($param = [])
    {
        //--------Autentificacion----------------//

        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['delete'])) {
            // Mensaje al usuario
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos
            header('location:' . URL . 'clientes');
        } else {
            $id = $param[0];
            $this->model->delete($id);
            header("Location:" . URL . "clientes");
        }

        //--------------------------------------//
    }

    # Método editar. 
    # Muestra un formulario que permita editar los detalles de un cliente
    public function editar($param = [])
    {
        //-----------------------------Validación/Autentificación/Gestion-------------------------------------//

        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['edit'])) {
            // Mensaje al usuario
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos
            header('location:' . URL . 'clientes');
        } else {
            # Obtenemos el id del cliente a editar
            $id = $param[0];
            $this->view->id = $id;

            # Asignamos un valor a la propiedad de la vista title
            $this->view->title = "Formulario  editar cliente";

            # Asignamos a la propiedad de la vista cliente el resultado del método getCliente
            $this->view->cliente = $this->model->getCliente($id);

            # Comprobamos si el formulario viene de una no validación y si existen errores
            if (isset($_SESSION["error"])) {

                // Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION["error"];

                // Autorellenamos el formulario
                $this->view->cliente = unserialize($_SESSION['cliente']);

                // Recuperamos el array de los errores
                $this->view->errores = $_SESSION['errores'];

                // Se eliminan las variables de session
                unset($_SESSION['error']);
                unset($_SESSION['cliente']);
                unset($_SESSION['errores']);
            }
            //--------------------------------------------------------------------------// 
            $this->view->render("clientes/editar/index");
        }
    }

    # Método update.
    # Actualiza los detalles de un cliente a partir de los datos del formulario de edición
    public function update($param = [])
    {

        //--------------------------Validación/Autentificación----------------------------------//

        # 1. Inicio/continuación de sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['edit'])) {
            // Mensaje al usuario
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos
            header('location:' . URL . 'clientes');
        } else {
            # 2. Saneamiento de los datos del formulario
            $apellidos = filter_var($_POST["apellidos"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $nombre = filter_var($_POST["nombre"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefono = filter_var($_POST["telefono"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

            # 3. Creamos el cliente, con los datos saneados
            $cliente = new classCliente(
                null,
                $apellidos,
                $nombre,
                $telefono,
                $ciudad,
                $dni,
                $email,
                null,
                null
            );

            # Cargamos el id del cliente que quiero actualizar
            $id = $param[0];

            # Obtenemos el objeto cliente original
            $clienteOriginal = $this->model->getCliente($id);

            # 4.Validación. Solo si es necesario o en caso de modificación de campo
            $errores = [];

            // Validación apellidos
            if (strcmp($apellidos, $clienteOriginal->apellidos) !== 0) {
                if (empty($apellidos)) {
                    $errores['apellidos'] = "Campo obligatorio";
                } else if (strlen($apellidos) > 45) {
                    $errores['apellidos'] = "Superaste el limite de caracteres";
                }
            }

            // Validación nombre
            if (strcmp($nombre, $clienteOriginal->nombre) !== 0) {
                if (empty($nombre)) {
                    $errores['nombre'] = "Campo obligatorio";
                } else if (strlen($nombre) > 20) {
                    $errores['nombre'] = "Superaste el limite de caracteres";
                }
            }

            // Validación telefono
            if (strcmp($telefono, $clienteOriginal->telefono)) {
                $tel = [
                    'options' => [
                        'regexp' => '/^[0-9]{9}$/'
                    ]
                ];

                if (!empty($telefono) && !filter_var($telefono, FILTER_VALIDATE_REGEXP, $tel)) {
                    $errores['telefono'] = "Debe ser numerico y tener 9 caracteres";
                }
            }

            // Validación ciudad
            if (strcmp($ciudad, $clienteOriginal->ciudad) !== 0) {
                // Ciudad. Obligatorio, tamaño máximo de 20
                if (empty($ciudad)) {
                    $errores['ciudad'] = "Campo obligatorio";
                } else if (strlen($ciudad) > 20) {
                    $errores['ciudad'] = "Superaste el limite de caracteres";
                }
            }

            // Validación dni
            if (strcmp($dni, $clienteOriginal->dni) !== 0) {
                $dniRegexp = [
                    'options' => [
                        'regexp' => '/^[0-9]{8}[A-Z]$/'
                    ]
                ];

                if (empty($dni)) {
                    $errores['dni'] = "Campo obligatorio";
                } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $dniRegexp)) {
                    $errores['dni'] = "Formato DNI incorrecto";
                } else if (!$this->model->validateUniqueDni($dni)) {
                    $errores['dni'] = "El DNI introducido ya ha sido registrado";
                }
            }

            // Validación email
            if (strcmp($email, $clienteOriginal->email) !== 0) {
                if (empty($email)) {
                    $errores['email'] = "Campo obligatorio";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errores['email'] = "Formato Email no válido";
                } else if (!$this->model->validateUniqueEmail($email)) {
                    $errores['email'] = "El correo electrónico introducido ya está registrado";
                }
            }

            # 5. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                $_SESSION['cliente'] = serialize($cliente);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                // Redireccionamos
                header('location:' . URL . 'clientes/editar/' . $id);
            } else {
                // Actualizamos el registro
                $this->model->update($cliente, $id);

                // Feedback
                $_SESSION['mensaje'] = 'Cliente actualizado correctamente';

                // Redireccionamos al main de clientes
                header("Location:" . URL . "clientes");
            }
        }

        //---------------------------------------------------------------------------//
    }


    # Método mostrar
    # Muestra en un formulario de solo lectura los detalles de un cliente
    public function mostrar($param = [])
    {
        //------------------Autentificacion------------------///
        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['show'])) {
            // Mensaje al usuario
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos
            header('location:' . URL . 'clientes');
        } else {
            $id = $param[0];
            $this->view->title = "Formulario Cliente Mostar";
            $this->view->cliente = $this->model->getCliente($id);
            $this->view->render("clientes/mostrar/index");
        }
        //--------------------------------------------------------//
    }

    # Método ordenar
    # Permite ordenar la tabla de clientes por cualquiera de las columnas de la tabla
    public function ordenar($param = [])
    {
        ///----------------------------Auten------------------//
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['order'])) {
            // Mensaje al usuario
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos
            header('location:' . URL . 'clientes');
        } else {
            $criterio = $param[0];
            $this->view->title = "Tabla Clientes";
            $this->view->clientes = $this->model->order($criterio);
            $this->view->render("clientes/main/index");
        }
        //------------------------------------------//
    }

    # Método buscar
    # Permite buscar los registros de clientes que cumplan con el patrón especificado en la expresión
    # de búsqueda
    public function buscar($param = [])
    {

        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['delete'])) {
            // Mensaje al usuario
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos
            header('location:' . URL . 'clientes');
        } else {
            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Clientes";
            $this->view->clientes = $this->model->filter($expresion);
            $this->view->render("clientes/main/index");
        }
    }
}
