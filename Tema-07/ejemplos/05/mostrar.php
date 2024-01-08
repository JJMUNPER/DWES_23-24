<?php
/*

    Ejemplo 7.5
    Mostrar valor Variables de sesion

*/

session_start();

#mostrar variable sesion
print_r($_SESSION);


echo 'id: '. $_SESSION['id'];
echo '<BR>';
echo 'Nombre: '. $_SESSION['nombre'];
echo '<BR>';
echo 'Apellidos: '. $_SESSION['apellidos'];

?>