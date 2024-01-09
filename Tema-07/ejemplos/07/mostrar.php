<?php

/**
 * 
 * Crear.php
 * 
 * Ejemplo creacion de cookie
 * 
 */

//Accedo a la cookie

if (isset($_COOKIE['datos_personales'])){
echo $_COOKIE['datos_personales'];
echo"<BR>";
} else{
    echo "Cookie no existente";
}

print_r($_COOKIE);


?>