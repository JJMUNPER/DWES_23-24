<?php

/*

    Ejemplo 7.5
    Variables de sesion

*/




# inicio sesión

session_start();
echo "sesión iniciada";
echo "<BR>";
echo "SID: ". session_id();
echo "<BR>";
echo "NAME: ". session_name();


?>