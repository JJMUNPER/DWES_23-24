<?php

    include("libs/crud_funciones.php");
    $articulos = generar_tabla_articulos();

    print_r(end($articulos));

?>