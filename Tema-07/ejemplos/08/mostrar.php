<?php

/**
 * 
 * Crear.php
 * 
 * Ejemplo creacion de cookie
 * 
 */

//Accedo a la cookie

if (isset($_COOKIE['nombre'])){
echo $_COOKIE['nombre'];
echo"<BR>";
} else{
    echo "Cookie no existente";
}

print_r($_COOKIE);

if (isset($_COOKIE['apellidos'])){
    echo $_COOKIE['apellidos'];
    echo"<BR>";
    } else{
        echo "Cookie no existente";
    }
    
    print_r($_COOKIE);
    


?>