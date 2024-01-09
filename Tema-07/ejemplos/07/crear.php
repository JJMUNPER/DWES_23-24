<?php

/**
 * 
 * Crear.php
 *  con nombre y apellidos
 * Ejemplo creacion de cookie
 * 
 */

//nombre cookie
$nombre_cookie = 'datos_personales';

//Almecene el nombre
setcookie('nombre', 'Juan Jesus', time() + 60*60);
setcookie('apellidos', 'Muñoz perez', time() + 60*60);

?>