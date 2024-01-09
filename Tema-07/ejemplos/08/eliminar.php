<?php

/**
 * 
 * Crear.php
 *  con nombre y apellidos
 * Ejemplo creacion de cookie
 * 
 */

//eliminar cookie
setcookie('nombre','',time() -3600);
setcookie('apellidos','',time() -3600);

echo 'cookie eliminada correctamente'

?>