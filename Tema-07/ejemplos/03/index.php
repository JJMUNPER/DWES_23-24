<?php

/*

    Ejemplo 7.3
    Sesión Personalizada

*/
# Personalizar la sesión (Por Id y nombre)
session_id('10101010166');
session_name('Jota');



# inicio sesión

session_start();
echo "sesión iniciada";
echo "<BR>";
echo "SID: ". session_id();
echo "<BR>";
echo "NAME: ". session_name();


?>