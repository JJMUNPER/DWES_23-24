<?php



/**
 * 127.0.0.1:3306
 * Conexión localhost con usuario root
 * a la BD de fp
 * 
 *      -conexion objeto mysqli
 *      -array indexado
 */


$server ='localhost';
$user = 'root';
$pass = '';
$db = 'fp';

$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion -> connect_errno) {
    echo 'ERROR DE CONEXION Nº: '. $conexion -> connect_errno;
    echo '<br>';
    echo'DESCRIPCIÓN ERROR: '. $conexion -> connect_error;
    exit();
}

echo 'Conexión establecida con éxito';

#Creo una variable con el comando SQL
$sql = 'select * from alumnos order by id';

#Objeto de la clase mysqli_result
$result = $conexion -> query($sql);

echo '<BR>';
echo 'Numero de registros: '. $result -> num_rows ;
echo '<BR>';
echo 'Numero de columnas: ' . $result -> field_count;
echo '<BR>';

// Obtengo un array asociativo
$alumnos = $result->fetch_all(MYSQLI_NUM);

// Array indexado, el indice se corresponde con el orden de cada
//columna en la tabla alumnos
$alumno = $alumnos[0];

var_dump($alumno);

?>