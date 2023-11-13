<?php

/*
Modelo: modelEliminar.php
Descripción: Elimina un elemento de la tabla

Método GET:
        - id: Identificador del elemento a eliminar
*/

$categorias = ArrayArticulos::getCategorias();

$articulos = new ArrayArticulos();
$articulos -> getDatos();

$marcas = ArrayArticulos::getMarcas();

//Obtener indice articulo
$indice= $_GET['indice'];



$articulos -> delete ( $indice );

$notificacion =" Borrado correctamente";
?>