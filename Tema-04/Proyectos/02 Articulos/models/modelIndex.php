<?php

/**
 * Modelo:modelIndex.php 
 * Descripcion: genera en array de objetos de artículos
 */
setlocale(LC_MONETARY, "es_ES");

#Cargamos los arrays a partir de los metodos estaticos de la clase
#ArrayArticulos. 
$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();

#Creamos un objeto de la clase ArrayArticulos
$articulos = new ArrayArticulos();
#Cargo los datos
$articulos->getDatos();


//Para probar lo hecho
// print_r($articulos);
// exit;


?>