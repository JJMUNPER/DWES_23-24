<?php
/**
 * Modelo:model.editar.php 
 * Desc
 */

 //Cargamos la tabla
$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
//creamos un objeto de la calse Array artiulos
$articulos = new ArrayArticulos();
//Cargo datos
$articulos->getDatos();

//obtener indice del articulo que voy a editar
$indice = $_GET['indice'];

$articulo =$articulos ->read($indice);

// var_dump($articulo);
// exit;


$notificacion =" Editado correctamente";


?>
