<?php

    # Autor:Juan Jesus
    # Curso:2ºDaw

    /**
     * ++Modelo++
     *  -Descripcion: 
     *      +Cargan los datos que luego se mostrara
     *      +Se asignan valores a las variables
     */

     $titulo="Un experimento confirma que la antimateria cae hacia abajo";
     $parrafo="Los rastros de antimateria encontrados entre los rayos cósmicos no dejaron tranquilos a los físicos. 
     Según la teoría del Big Bang, cuando el universo se infló a partir de un punto infinitamente denso y pequeño para alumbrar el cosmos, 
     surgió una cantidad idéntica de materia y antimateria. Eso habría generado una situación problemática para nosotros, porque cada vez que 
     una partícula se juntase con su antipartícula se desintegraría en medio de un estallido liberador de energía. Sin ladrillos para construir, 
     no habría sido posible la formación de galaxias o antigalaxias ni de humanos ni antihumanos. 
     El origen de esa violación de la simetría inicial se ha buscado en muchos sitios, también en un distinto comportamiento ante la gravedad.";
     $enlace="https://elpais.com/ciencia/2023-09-27/un-experimento-confirma-que-la-antimateria-cae-hacia-abajo.html";

     $str1="Hola";
     $str2="Mundo";
     $str3=$str1 . $str2;

     $float=1.2;
     $int=2;
     $suma=$float + $int;
     $resta=$float - $int;
     $division=$float / $int;
     $multiplicacion=$float * $int;
     $potencia= pow($float,$int);
     $result = var_dump($suma). " " .var_dump($resta).  " " .var_dump($division). " " .var_dump($multiplicacion). " " .var_dump($potencia);

     $phpInfo= phpinfo();
     $info =$phpInfo;


?>

