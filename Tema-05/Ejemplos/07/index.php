<?php

/**
 * 
 * Conexion mediante PDO
 * 
 */

$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'fp';

#Establecemos la conexion

try {

    $dsn = "mysql:host = $server; dbname=$database";

    //Array idexado parametro -> valor
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    $pdo = new PDO($dsn, $user, $pass, $options);

} catch (PDOException $e) {

   include 'errorDB.php';

    exit();
}

echo "Conexión realizada con exito";


?>