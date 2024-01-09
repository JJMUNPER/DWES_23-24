<?php

/*
    Contador de visitas
*/

//comprobar si existe la cookie contador

if (isset($_COOKIE['contador'])){

    //Actualizar numero de visitas
    $num_visitas = $_COOKIE['contador'];
    $num_visitas = $num_visitas + 1;
    setcookie('contador', $num_visitas, time() + 365 * 24 * 60 * 60);
} else {
    setcookie('contador', 1, time() + 365 * 24 * 60 * 60);
    $num_visitas = 1;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Cookies</title>
</head>
<body>
    <h1>Numero Visitas: <?=$num_visitas?></h1>
    <li>
        <ul>
            <a href="crear.php">Crear</a>
        </ul>
        <ul>
            <a href="mostrar.php">Mostrar</a>
        </ul>
        <ul>
            <a href="eliminar.php">Eliminar</a>
        </ul>
    </li>
    
</body>
</html>