<?php

class Cuentas extends Controller
{

    # Render
    function render($param = [])
    {
        # Inicio o continuo sesion
        session_start();

        //Validacion//

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {

            # Si existe mensaje lo mostramos
            if (isset($_SESSION['mensaje'])) {
                // Añadimos mensaje
                $this->view->mensaje = $_SESSION['mensaje'];
                // eliminamos mensjae
                unset($_SESSION['mensaje']);
            }
            $this->view->title = "Tabla Cuentas";
            $this->view->cuentas = $this->model->get();
            $this->view->render("cuentas/main/index");
        }
    }

    # Nuevo
    function nuevo($param = [])
    {
        # Inicio o continuo sesion
        session_start();

        //Validacion//

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {

            # Creamos un objeto vacío
            $this->view->cuenta = new classCuenta();

            # Comprobamos si existen errores
            if (isset($_SESSION['error'])) {
                // Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->cuenta = unserialize($_SESSION['cuenta']);

                // Recuperamos el array con los errores
                $this->view->errores = $_SESSION['errores'];

                // Una vez usadas las variables de sesión, las liberamos
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cuenta']);
            }

            $this->view->title = "Añadir cuenta";

            // Lista dinámica select
            $this->view->clientes = $this->model->getClientes();

            // Redireccion
            $this->view->render("cuentas/nuevo/index");
        }
    }

    # Create
    function create($param = [])
    {
        # Iniciamos o continuamos la sesión
        session_start();

        //Validacion//

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {

            # 1. Saneamiento de los datos del formulario
            $num_cuenta = filter_var($_POST['num_cuenta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_cliente = filter_var($_POST['id_cliente'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $fecha_alta = filter_var($_POST['fecha_alta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $saldo = filter_var($_POST['saldo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            # 2. Creamos ell objeto con los datos saneados
            $cuenta = new classCuenta(
                null,
                $num_cuenta,
                $id_cliente,
                $fecha_alta,
                date("d-m-Y H:i:s"),
                0,
                $saldo,
                null,
                null
            );

            # 3. Validación
            $errores = [];

            // Validacion cuenta requiere de expresion regular
            $cuenta_regexp = [
                'options' => [
                    'regexp' => '/^[0-9]{20}$/'
                ]
            ];
            if (empty($num_cuenta)) {
                $errores['num_cuenta'] = 'Campo obligatorio';
            } else if (!filter_var($num_cuenta, FILTER_VALIDATE_REGEXP, $cuenta_regexp)) {
                $errores['num_cuenta'] = 'Formato no valido';
            } else if (!$this->model->validateUniqueNumCuenta($num_cuenta)) {
                $errores['num_cuenta'] = "El número de cuenta ya EXISTE";
            }

            // Cliente. Campo obligatorio y debe existir en la tabla de clientes
            if (empty($id_cliente)) {
                $errores['id_cliente'] = 'Campo Obligatorio';
            } else if (!filter_var($id_cliente, FILTER_VALIDATE_INT)) {
                $errores['id_cliente'] = 'Valor NUmerico';
            } else if (!$this->model->validateCliente($id_cliente)) {
                $errores['id_cliente'] = 'No existe el cliente';
            }

            // Fecha alta. Campo obligatorio, con formato valido
            if (empty($fecha_alta)) {
                $errores['fecha_alta'] = 'Campo Obligatorio';
            } else if (!$this->model->validateFecha($fecha_alta)) {
                $errores['fecha_alta'] = 'Formato Incorrecto';
            }

            # 4. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                $_SESSION['cuenta'] = serialize($cuenta);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                // Redireccionamos
                header('location:' . URL . 'cuentas/nuevo/index');
            } else {
                # Añadimos el registro
                $this->model->create($cuenta);

                // Mensaje feedback cliente
                $_SESSION['mensaje'] = "Se ha creado la cuenta correctamente";

                // Redireccion
                header("Location:" . URL . "cuentas");
            }

        }
    }

    # Delete
    function delete($param = [])
    {
        # Inciamos sesion
        session_start();

        //Validacion//

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {
            $id = $param[0];
            $this->model->delete($id);
            header("Location:" . URL . "cuentas");
        }
    }

    # Editar
    function editar($param = [])
    {
        # Inicio o continuo sesion
        session_start();

        //Validacion//

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {

            # Obtencion Id
            $id = $param[0];

            # Asignamos Id
            $this->view->id = $id;

            # Comprobamos el formulario
            if (isset($_SESSION['error'])) {
                // Añadimos mensaje de error
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->cuenta = unserialize($_SESSION['cuenta']);

                // Array errores
                $this->view->errores = $_SESSION['errores'];

                //Elimino variables session
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cuenta']);


            }

            // Propiedda a title
            $this->view->title = "Formulario editar cuenta";

            // Cogemos los datos de los get (clientes y cuenta)
            $this->view->clientes = $this->model->getClientes();
            $this->view->cuenta = $this->model->getCuenta($id);

            // Redireccion
            $this->view->render("cuentas/editar/index");
        }
    }

    # Update
    function update($param = [])
    {
        # Iniciamos o continuamos la sesión
        session_start();

        //Validacion//

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else {

            # 1. Saneamos los datos del formulario
            $num_cuenta = filter_var($_POST['num_cuenta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_cliente = filter_var($_POST['id_cliente'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $num_movimientos = filter_var($_POST['num_movtos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fechaUltMovimiento = filter_var($_POST['fecha_ul_mov'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_alta = filter_var($_POST['fecha_alta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $saldo = filter_var($_POST['saldo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            # 2. Creamos el objeto cuenta a partir de los datos saneados
            $cuenta = new classCuenta(
                null,
                $num_cuenta,
                $id_cliente,
                $fecha_alta,
                $fechaUltMovimiento,
                $num_movimientos,
                $saldo,
                null,
                null
            );

            # Cargamos el id de la cuenta a actualizar
            $id = $param[0];

            # Obtenemos el objeto original de la clase classCuenta
            $original = $this->model->getCuenta($id);

            # 3. Validación
            $errores = [];

            // Validar el numero de cuenta
            if (strcmp($num_cuenta, $original->num_cuenta) !== 0) {
                $cuenta_regexp = [
                    'options' => [
                        'regexp' => '/^[0-9]{20}$/'
                    ]
                ];
                if (empty($num_cuenta)) {
                    $errores['num_cuenta'] = 'Campo Obligatorio';
                } else if (!filter_var($num_cuenta, FILTER_VALIDATE_REGEXP, $cuenta_regexp)) {
                    $errores['num_cuenta'] = 'Formato no valido';
                } else if (!$this->model->validateUniqueNumCuenta($num_cuenta)) {
                    $errores['num_cuenta'] = "El número de cuenta ya está registrado";
                }
            }

            // Validar el cliente
            if (strcmp($id_cliente, $original->id_cliente) !== 0) {
                if (empty($id_cliente)) {
                    $errores['id_cliente'] = 'Campo Obligatorio';
                } else if (!filter_var($id_cliente, FILTER_VALIDATE_INT)) {
                    $errores['id_cliente'] = 'Deberá introducir un valor númerico en este campo';
                } else if (!$this->model->validateCliente($id_cliente)) {
                    $errores['id_cliente'] = 'No existe el cliente indicado';
                }
            }

            // Validar la fecha de alta
            if (strcmp($fecha_alta, $original->fecha_alta) !== 0) {
                if (empty($fecha_alta)) {
                    $errores['fecha_alta'] = 'Campo Obligatorio';
                } else if (!$this->model->validateFecha($fecha_alta)) {
                    $errores['fecha_alta'] = 'Formato incorrecto';
                }
            }

            // Validamos la fecha de último movimiento
            if (strcmp($fechaUltMovimiento, $original->fecha_ul_mov)) {
                if (!empty($fechaUltMovimiento && !$this->model->validateFecha($fechaUltMovimiento))) {
                    $errores['fecha_ul_mov'] = 'Formato incorrecto';
                }
            }

            # 4. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                $_SESSION['cuenta'] = serialize($cuenta);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                // Redireccionamos
                header('location:' . URL . 'cuentas/editar/' . $id);
            } else {
                // Actualizamos el registro de la base de datos
                $this->model->update($cuenta, $id);

                // Creamos el mensaje personalizado
                $_SESSION['mensaje'] = 'Cuenta actualizada';

                // Redireccionamos a la vista principal de cuentas
                header("Location:" . URL . "cuentas");
            }

        }



        # Mostrar
        function mostrar($param = [])
        {
            #Inicio o continuo sesion
            session_start();

            //Validacion//

            # Comprobamos si el usuario está autentificado
            if (!isset($_SESSION['id'])) {
                // Añadimo el siguiente aviso al usuario: 
                $_SESSION['mensaje'] = "Usuario debe autentificarse";

                // Redireccionamos al login
                header('location:' . URL . 'login');
            } else {
                # id de la cuenta
                $id = $param[0];

                $this->view->title = "Formulario Mostrar Cuenta";
                $this->view->cuenta = $this->model->getCuenta($id);
                $this->view->cliente = $this->model->getCliente($this->view->cuenta->id_cliente);
                $this->view->render("cuentas/mostrar/index");
            }
        }

        # Ordenar
        function ordenar($param = [])
        {
            # Lo de siempre/inicio-continuo session
            session_start();

            //Validacion//

            # Comprobamos si el usuario está autentificado
            if (!isset($_SESSION['id'])) {
                // Añadimo el siguiente aviso al usuario: 
                $_SESSION['mensaje'] = "Usuario debe autentificarse";

                // Redireccionamos al login
                header('location:' . URL . 'login');
            } else {
                $criterio = $param[0];
                $this->view->title = "Tabla Cuentas";
                $this->view->cuentas = $this->model->order($criterio);
                $this->view->render("cuentas/main/index");

            }
        }

        #Buscar
        function buscar($param = [])
        {
            # Lo de siempre/inicio-continuo session
            session_start();

            //Validacion//

            # Comprobamos si el usuario está autentificado
            if (!isset($_SESSION['id'])) {
                // Añadimo el siguiente aviso al usuario: 
                $_SESSION['mensaje'] = "Usuario debe autentificarse";

                // Redireccionamos al login
                header('location:' . URL . 'login');
            } else {
                $expresion = $_GET["expresion"];
                $this->view->title = "Tabla Cuentas";
                $this->view->cuentas = $this->model->filter($expresion);
                $this->view->render("cuentas/main/index");
            }
        }
    }
}

