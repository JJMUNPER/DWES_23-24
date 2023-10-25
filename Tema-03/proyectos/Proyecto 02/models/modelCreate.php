<?php
    /*
        Modelo: modelCreate.php
        Descripción: Cargaremos los datos del formulario nuevo y los introducimos al array original de artículos
    */

    $articulos=generar_tabla_articulos();
    $categorias=generar_tabla_categorias();
    // Empezamos
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $categori = $_POST['categorias'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];

    // Deberemos crear la estructura de un array asociativo
    // Al no pedir introducir un id, deberá generarse automaticamente
    $id = ultimoId($articulos)+1;

    // Invocamos a la función nuevo(), que nos permitirá introducir
    //nuevo($articulos,$id,$descripcion,$modelo,$categori,$unidades,$precio);
    $articulo = [
        'id' => $id,
        'descripcion'=> $descripcion,
        'modelo'=> $modelo,
        'categoria'=> $categori,
        'unidades'=> $unidades,
        'precio'=> $precio
    ];
    
    array_push($articulos, $articulo);

    /**
     * Se puede hacer tambien
     * 
     * $articulos[]=
     */

?>