<?php

$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
$articulos = new ArrayArticulos();
$articulos->getDatos();

$indice = $_GET['indice'];

$articulo =$articulos ->editar($indice);


$notificacion =" Editado correctamente";


?>
