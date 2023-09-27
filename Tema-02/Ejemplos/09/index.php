<?php

    //Tipos de variables

    #Tipo boolean

    $test=true;
    echo "\$test: ";
    var_dump($test);//Se usa a nivel de depuracion
    //Para saber que tipo de constante es y que valor tiene

    echo"<br>";

    #Tipo float
    $altura =1.70;
    echo "\$altura: ";
    var_dump($altura);

    echo"<br>";

    #Tipo float exponencial

    $distancia = 1.70e4;
    echo"\$distancia: ";
    var_dump($distancia);

    echo"<br>";

    #Tipo String

    $mensaje= "La distancia recorrida fue de $distancia km";
    echo "\$mensaje: ";
    var_dump($mensaje);

    echo"<br>";

    #Tipo String ''

    $mensaje= 'La distancia recorrida fue de $distancia km';
    echo "\$mensaje: ";
    var_dump($mensaje);

    echo"<br>";

    #Tipo String ''

    $mensaje= "La distancia recorrida fue de '.$distancia.' km";
    echo "\$mensaje: ";
    var_dump($mensaje);

    echo"<br>";



?>