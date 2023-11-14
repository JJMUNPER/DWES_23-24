<?php



/**
 * 127.0.0.1:3306
 * Conexión localhost con usuario root
 * a la BD de fp
 * 
 *      -conexion mysqli_connect()
 */


$server ='localhost';
$user = 'root';
$pass = '';
$db = 'fp';

$conexion = mysqli_connect($server, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo 'ERROR DE CONEXION Nº: '. mysqli_connect_errno();
    echo '<br>';
    echo'DESCRIPCIÓN ERROR: '. mysqli_connect_error();
    exit();
}

echo 'Conexión establecida con éxito';

?>