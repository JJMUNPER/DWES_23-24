<?php

/*

    Ejemplo 7.4
    Destruir sesión

*/

# Continuo co la sesion

session_start();

#Detalles de la session


echo "<BR>";
echo "SID: ". session_id();
echo "<BR>";
echo "NAME: ". session_name();

# Elimino sesion

session_destroy();
session_unset();




?>