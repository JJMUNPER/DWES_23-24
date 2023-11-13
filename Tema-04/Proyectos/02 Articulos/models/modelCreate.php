<?php

/**
 * Descripcion: añade un nuevo articulo a la tabla
 * 
 * Metodo POST
 *              -id
 *              -descripcion
 *              -modelo
 *              -precio
 *              -marca-indice
 *              -categorias-array
 *              -unidades
 * 
 */
#cargamos array marcas categorias
$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();


#cargo articulos
$articulos =new ArrayArticulos();
$articulos -> getDatos();

#Cargo en variables los detalles del articulo
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$categorias_art = $_POST['categorias'];
$unidades = $_POST['unidades'];
$precio = $_POST ['precio'];


#validacion

#creo un objeto clase articulo a partir de los detalles
#del formulario

$articulo= new Articulo(
    $id,
    $descripcion,
    $modelo,
    $marca,
    $categorias_art,
    $unidades,
    $precio
    
);


#añadimos el articulo a la tabla

$articulos -> create($articulo);

#genero notificacion
$notificacion = " Articulo creado con exito";

?>