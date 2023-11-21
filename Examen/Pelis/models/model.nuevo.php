<?php

    /*
        fichero: model.nuevo.php
        Descripción: modelo del proceso nuevo.php. 

    */

    $paises = getPaises();
    $generos = getGeneros();
    
    include "views/view.nuevo.php";
?>