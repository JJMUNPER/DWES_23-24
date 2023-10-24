<?php

/**
 * 
 *  Modelo: modelIndex.php
 *  Descripcion: genera en array los datos de los aticulos
 */


setlocale(LC_MONETARY,"es_ES");
$categorias=generar_tabla_categorias();
$articulos=generar_tabla_articulos();

?>