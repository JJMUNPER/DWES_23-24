<?php
require_once 'class/class.cliente.php';

class Clientes extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render()
    {

        # Creo la propiedad title de la vista
        $this->view->title = "Home - Clientes";

        # Creo la propiedad clientes dentro de la vista
        # Ejecuto el método get() para obtener la lista de clientes;
        $this->view->clientes = $this->model->get();

        #Cargo la vista principal
        $this->view->render('clientes/main/index');
    }

    function new()
    {

        # etiqueta title de la vista
        $this->view->title = "Añadir - Gestión Clientes";

        # cargo la vista con el formulario nuevo cliente
        $this->view->render('clientes/new/index');
    }

    function create($param = [])
    {

        # Cargo datos del formulario
        $cliente = new ClassCliente(
            null,
            $_POST['nombre'],
            $_POST['apellidos'],
            $_POST['email'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni']
        );

        # Añado el registro a la tabla
        $this->model->create($cliente);

        # Redirijo al main de clientes
        header('location:' . URL . 'clientes');
    }

    function edit($param = [])
    {

        $id = $param[0];

        # asigno id a una propiedad de la vista
        $this->view->id = $id;

        # título
        $this->view->title = "Editar - Panel de control Clientes";

        # obtengo el objeto de la clase cliente
        $this->view->cliente = $this->model->read($id);

        # cargo la vista
        $this->view->render('clientes/edit/index');

    }

    public function update($param = [])
    {

        # Cargo id del cliente
        $id = $param[0];

        # Creo objeto cliente con los detalles formulario 
        $cliente = new ClassCliente(

            null,
            $_POST['nombre'],
            $_POST['apellidos'],
            $_POST['email'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni']

        );

        # Actualizo base  de datos
        $this->model->update($cliente, $id);

        # Cargo el controlador principal de cliente
        header('location:' . URL . 'clientes');

    }

    function delete($param)
    {
        # Cargo id del cliente
        $this->view->id = $param[0];

        # ejecuto la función delete
        $this->view->delete = $this->model->delete($this->view->id);

        # redirijo al main de clientes
        header('location: ' . URL . 'clientes');

    }

    function show($param)
    {

        # Cargo id del cliente
        //$this->view->id = $param[0];
        $id = $param[0];

        #título
        $cliente = $this->model->read($id);
        #ejecuto la función read
        $this->view->title = "Details";
        $this->view->cliente = $cliente;
        # cargo la vista de mostrar
        $this->view->render('clientes/show/index');

    }

    

    public function order($param = [])
    {

        # Obtengo criterio de ordenación
        $criterio = $param[0];

        # Título de la vista
        $this->view->title = "Ordenar - Panel Control Clientes";

        # Creo la propiedad cliente dentro de la vista
        $this->view->clientes = $this->model->order($criterio);

        # Cargo la vista principal de cliente
        $this->view->render('clientes/main/index');
    }

    public function filter($param = [])
    {

        # Obtengo expresión de búsqueda
        $expresion = $_GET['expresion'];

        # Título de la vista
        $this->view->title = "Buscar - Panel Control Clientes";

        # Filtro a partir de la  expresión
        $this->view->clientes = $this->model->filter($expresion);

        # Cargo la vista principal de cliente
        $this->view->render('clientes/main/index');
    }
}

?>