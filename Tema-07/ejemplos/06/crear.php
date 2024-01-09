<?php

/**
 * 
 * Crear.php
 * 
 * Ejemplo creacion de cookie
 * 
 */

//nombre cookie
$nombre_cookie = 'datos_personales';

//Almecene el nombre
$nombre = 'Juan Jesus';

//Expire a los 60 minutos
$expiracion = time() + 60 * 60;

if (setcookie($nombre_cookie, $nombre, $expiracion))
    echo "Cookie creada correctamente";


?>