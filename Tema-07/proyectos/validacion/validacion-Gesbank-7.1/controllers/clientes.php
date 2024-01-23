<?php

class Clientes extends Controller
{

    # Muestra los clientes/Metodo principal
    public function render($param = [])
    {
        # Inicio o continuo sesion
        session_start();
        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";
            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {

            # Mostrar mensaje existente
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }
            //Propiedad a title
            $this->view->title = "Tabla Clientes";
            //Resultado del get() a la vista clientes
            $this->view->clientes = $this->model->get();
            //Redireccion
            $this->view->render("clientes/main/index");
        }
    }

    # Método nuevo. Muestra formulario crear cliente
    public function nuevo($param = [])
    {
        # Iniciamos o continuamos la sesión
        session_start();

        /**Validacion de nuevo */

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {
            # Creamos un objeto vacio
            $this->view->cliente = new classCliente();


            # Comprobamos si existen errores
            if (isset($_SESSION['error'])) {
                // Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->cliente = unserialize($_SESSION['cliente']);

                // Recuperamos array errores
                $this->view->errores = $_SESSION['errores'];

                //Elimino variables session
                unset($_SESSION['error']);
                unset($_SESSION['cliente']);
                unset($_SESSION['errores']);

            }

            # Añadimos a la vista la propiedad title
            $this->view->title = "Cliente nuevo";

            # Cargamos la vista del formulario para añadir un nuevo cliente
            $this->view->render("clientes/nuevo/index");
        }
    }

    # El método Create 
    public function create($param = [])
    {
        //Validacion//

        # 1. Inicio o continuo sesion
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {
            # 2. Saneamiento de los datos del formulario
            $nombre = filter_var($_POST["nombre"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $apellidos = filter_var($_POST["apellidos"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefono = filter_var($_POST["telefono"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

            # 3. Creamos el cliente con los datos saneados
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

            // Creamos array errores, donde almacenaremos los errores ocurridos
            $errores = [];

            // Apellidos: campo obligatorio (max)
            if (empty($apellidos)) {
                $errores['apellidos'] = "Campo obligatorio";
            } else if (strlen($apellidos) > 45) {
                $errores['apellidos'] = "Superaste el limite";
            }

            // Nombre: campo obligatorio
            if (empty($nombre)) {
                $errores['nombre'] = "Campo obligatorio";
            } else if (strlen($nombre) > 20) {
                $errores['nombre'] = "Superaste el limite";
            }

            // Validamos telefono con una expresion regular
            $tel = [
                'options' => [
                    'regexp' => '/^[0-9]{9}$/'
                ]
            ];

            if (!empty($telefono) && !filter_var($telefono, FILTER_VALIDATE_REGEXP, $tel)) {
                $errores['telefono'] = "Formato incorrecto";
            }

            // Poblacion: Obligatorio
            if (empty($ciudad)) {
                $errores['ciudad'] = "Campo obligatorio";
            } else if (strlen($ciudad) > 20) {
                $errores['ciudad'] = "Superaste el limite";
            }

            //DNI: Obligatorio, con expresion regular
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
                $errores['dni'] = "El DNI introducido ya existe";
            }

            // Email: Obligatorio 
            if (empty($email)) {
                $errores['email'] = "Campo obligatorio";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Formato Email no valido";
            } else if (!$this->model->validateUniqueEmail($email)) {
                $errores['email'] = "El correo ya existe";
            }

            # 5. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                $_SESSION['cliente'] = serialize($cliente);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                // Redireccion formulario a /nuevo
                header('Location:' . URL . 'clientes/nuevo');
            } else {
                // Creamos el registro
                $this->model->create($cliente);

                // Mensaje feedback usuario
                $_SESSION['mensaje'] = 'Cliente creado correctamente';

                // Redireccion vista clientes
                header("Location:" . URL . "clientes");
            }

        }
    }

    # Método Delete 
    public function delete($param = [])
    {
        # Iniciamos o continuamos sesion
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {
            $id = $param[0];
            $this->model->delete($id);
            header("Location:" . URL . "clientes");
        }
    }


    # Método Editar. 
    public function editar($param = [])
    {
        # Inicio o continuo sesion
        session_start();

        //Validacion//

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Mensaje feedback 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redirecciono
            header('location:' . URL . 'login');
        } else {
            # Obtenemos el id del cliente
            $id = $param[0];
            $this->view->id = $id;

            $this->view->title = "Editar cliente";

            # Asignamos método getCliente
            $this->view->cliente = $this->model->getCliente($id);

            # Comprobamos si viene de una no validacion
            if (isset($_SESSION["error"])) {
                // Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION["error"];

                // Autorellenamos el formulario
                $this->view->cliente = unserialize($_SESSION['cliente']);

                // Recuperamos el array con los errores
                $this->view->errores = $_SESSION['errores'];

                unset($_SESSION['error']);
                unset($_SESSION['cliente']);
                unset($_SESSION['errores']);

            }

            # Cargamos la vista edit del cliente
            $this->view->render("clientes/editar/index");
        }
    }


    # Método Update: se actualiza, sanea e introducimos datos
    public function update($param = [])
    {

        # 1. Inicio o continuación de sesión
        session_start();

        //Validacion//

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Mensaje feedback 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redirecciono
            header('location:' . URL . 'login');
        } else {
            # 2. Saneamiento de los datos del formulario
            $nombre = filter_var($_POST["nombre"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $apellidos = filter_var($_POST["apellidos"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
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

            # Cargamos el id del cliente a actualizar
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
                    $errores['apellidos'] = "Superaste el limite";
                }
            }

            // Validación nombre
            if (strcmp($nombre, $clienteOriginal->nombre) !== 0) {
                if (empty($nombre)) {
                    $errores['nombre'] = "Campo obligatorio";
                } else if (strlen($nombre) > 20) {
                    $errores['nombre'] = "Superaste el limite";
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
                    $errores['telefono'] = "Formato incorrecto";
                }
            }

            // Validación poblacion
            if (strcmp($ciudad, $clienteOriginal->ciudad) !== 0) {
                // Poblacion obligada
                if (empty($ciudad)) {
                    $errores['ciudad'] = "Campo obligatorio";
                } else if (strlen($ciudad) > 20) {
                    $errores['ciudad'] = "Superaste el limite";
                }
            }

            // Validación DNI
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
                    $errores['dni'] = "Ya existe el DNI";
                }
            }

            // Validación Email
            if (strcmp($email, $clienteOriginal->email) !== 0) {
                if (empty($email)) {
                    $errores['email'] = "Campo obligatorio";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errores['email'] = "Formato Email no válido";
                } else if (!$this->model->validateUniqueEmail($email)) {
                    $errores['email'] = "Ya existe el Email";
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

                // mensaje feedback cliente
                $_SESSION['mensaje'] = 'Cliente actualizado correctamente';

                // Redireccionamos
                header("Location:" . URL . "clientes");
            }
        }
    }



    # Método Mostrar
    public function mostrar($param = [])
    {
        #Inicio o continuo sesion
        session_start();

        //Validacion//

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Mensaje feedback 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redirecciono
            header('location:' . URL . 'login');
        } else {
            $id = $param[0];
            $this->view->title = "Formulario Cliente Mostar";
            $this->view->cliente = $this->model->getCliente($id);
            $this->view->render("clientes/mostrar/index");
        }
    }

    # Método Ordenar
    public function ordenar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {
            $criterio = $param[0];
            $this->view->title = "Tabla Clientes";
            $this->view->clientes = $this->model->order($criterio);
            $this->view->render("clientes/main/index");
        }
    }

    # Método Buscar
    public function buscar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {

            // Feedback user 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos
            header('location:' . URL . 'login');
        } else {
            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Clientes";
            $this->view->clientes = $this->model->filter($expresion);
            $this->view->render("clientes/main/index");
        }
    }
}
