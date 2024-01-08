<?php
class Cliente extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        
        $this->view->title = "Home - Panel Control Clientes";

       
        $this->view->clientes = $this->model->get();

        $this->view->render('cliente/main/index');
    }

    function new()
    {

        
        $this->view->title = "Añadir - Gestión Clientes";

        $this->view->render('cliente/new/index');
    }

    function create($param = [])
    {
        
        $cliente = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email']
        );

        
        $this->model->create($cliente);

        
        header("Location: " . URL . "cliente");
    }


    function edit($param = [])
    {
        
        $id = $param[0];

        
        $this->view->id = $id;

        
        $this->view->title = "Editar - Gestión Cliente";

        //Obtener objeto de la clase cliente
        $this->view->cliente = $this->model->read($id);

        //Cargo la vista
        $this->view->render('cliente/edit/index');
    }

    function update($param = [])
    {
      
        $id = $param[0];

        //Asignamos el id a una variable de la vista
        $this->view->id = $id;

        //Cargo detalles del formulario
        $cliente = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email']
        );

        //Obtener objeto de la clase cliente
        $this->model->update($id, $cliente);

        //Redigirimos a "cliente"
        header("Location: " . URL . "cliente");
    }

    function delete($param = [])
    {
        //Obtengo el valor del ID del cliente a eliminar
        $id = $param[0];

        //Asignamos el id a una variable de la vista
        $this->view->id = $id;

        //Eliminamos el registro en la base de datos
        $this->model->delete($id);

        //Redigirimos a "cliente"
        header("Location: " . URL . "cliente");
    }

    function show($param = [])
    {
        //Obtengo el valor del ID del cliente a mostrar
        $id = $param[0];

        //Asignamos el id a una variable de la vista
        $this->view->id = $id;

        //Cambio la propiedad title de la vista
        $this->view->title = "Mostrar - Gestión Cliente";

        //Obtener objeto de la clase cliente
        $this->view->cliente = $this->model->read($id);

        //Cargo la vista
        $this->view->render('cliente/show/index');
    }


    function order($param = [])
    {
        //criterio de ordenación
        $criterioOrdenacion = $param[0];

        
        $this->view->title = "Ordenar - Gestión Clientes";

        
        $this->view->clientes = $this->model->order($criterioOrdenacion);

        //Cargo la vista index
        $this->view->render('cliente/main/index');
    }
    function filter($param = [])
    {
        //filtrado
        $expresion = $_GET['expresion'];

        //vista
        $this->view->title = "Buscar - Gestión clientes";

        
        $this->view->clientes = $this->model->filter($expresion);

        //Cargo index
        $this->view->render('cliente/main/index');
    }
}

?>