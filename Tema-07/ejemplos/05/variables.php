<?php

/*

    Ejemplo 7.5
    Variables de sesion

*/

#inicio de sesion

session_start();

# crear variable de sesión
$_SESSION['nombre'] = 'Jota';
$_SESSION['apellidos'] = 'Muñoz Perez';
$_SESSION['id'] = 234;

echo 'variables creadas';

?>