<?php 
$articulos = generar_tabla();
$categorias = generar_categorias();

$indice = $_GET['indice'];

$indice_mostrar = buscar_en_tabla($articulos, 'indice', $indice);

if ($indice_mostrar !== false ) {
    $articulo = $articulos[$indice_mostrar];
} else {
    echo ("articulo no encontrado");
}


?>