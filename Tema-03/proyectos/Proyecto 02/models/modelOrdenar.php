<?php

$criterio=$_GET["criterio"];

$articulos=generar_tabla_articulos();
$categorias=generar_tabla_categorias();

$articulos= ordenar($articulos,$criterio);

?>