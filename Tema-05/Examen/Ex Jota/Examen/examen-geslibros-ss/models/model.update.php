<?php

    /*
        Modelo create

        Recibe los valores del formulario nuevo libro
        hay que tener en cuenta que he dejado de utilizar algunos campos
    */


    //Id
    $id_editar = $_GET['id'];
    $isbn= $_POST['isbn'];
    $ean=$_POST['ean'];
    $titulo = $_POST ['titulo'];
    $autor=$_POST['autor_id'];
    $editorial=$_POST["editorial_id"];
    $precio_coste=$_POST['precio_coste'];
    $precio_venta=$_POST['precio_venta'];
    $stock=$_POST['stock'];
    
    $edicion=$_POST['fecha_edicion'];
    
    
    
    
    

    $libro = new Libro();

?>