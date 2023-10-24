<?php

$articulos=generar_tabla_articulos();
$categorias=generar_tabla_categorias();

$valores = [
    "id"=> $_POST['id'],
    'descripcion'=> $_POST['descripcion'],
    'modelo'=> $_POST['modelo'],
    'categoria'=> $_POST['categoria'],
    'unidades'=> $_POST['unidades'],
    'precio'=> $_POST['precio'],
];

$articulos = nuevo($articulos,$valores);

?>