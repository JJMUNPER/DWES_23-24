<?php

$articulos=generar_tabla_articulos();
$categorias=generar_tabla_categorias();

$indice=$_GET['key'];

$articulos=eliminar($articulos,$indice);

?>