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
    $autor_id=$_POST['autor'];
    $editorial_id=$_POST["editorial"];
    $precio_coste=$_POST['coste'];
    $precio_venta=$_POST['pvp'];
    $stock=$_POST['stock'];
    $stock_min=$_POST['stockminimo'];
    $stock_max=$_POST['stockmaximo'];
    $fecha_edicion=$_POST['fechaedicion'];
    $num_pagina=$_POST['paginas'];
    

    $libro->id = $id_editar;
    $libro->isbn = $isbn;
    $libro->ean = $ean;
    $libro->titulo = $titulo;
    $libro->autor = $autor_id;
    $libro->editorial = $editorial_id;
    $libro->coste = $precio_coste;
    $libro->pvp = $precio_venta;
    $libro->stock = $stock;
    $libro->stockminimo = $stock_min;
    $libro->stockmaximo = $stock_max;
    $libro->fechaedicion = $fecha_edicion;
    $libro->paginas = $num_pagina;  
    
    $conexion->update_libro($libro, $id_libro);
    
    
    



?>