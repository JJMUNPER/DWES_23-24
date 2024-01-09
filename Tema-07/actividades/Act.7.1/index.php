<?php

/*
    Contador de visitas
*/

session_start();

if (isset($_SESSION['num_visitas_home'])){
    $_SESSION['num_visitas_home'] ++;
} else {
    $_SESSION['num_visitas_home'] = 1;
}

if (isset($_SESSION['num_visitas_home'])){
    $_SESSION['fecha_hora_visita'] = t;
}


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
    <title>Actividad 7.1</title>
</head>
<body>
    <h1>Numero Visitas: <?=$num_visitas?></h1>
    <li>
        <ul>
            <a href="#">Home</a>
        </ul>
        <ul>
            <a href="acercade.php">A cerca de</a>
        </ul>
        <ul>
            <a href="servicios.php">Servicios</a>
        </ul>
        <ul>
            <a href="eventos.php">Eventos</a>
        </ul>
        <ul>
            <a href="close.php">Cerrar</a>
        </ul>
    </li>

    <h3>Detalles de la pagina</h3>
    <ul>
        <li>Página: Home</li>
        <li>SID: <?= session_id ?></li>
        <li>Nombre Sesion: <?= session_name?></li>
        <!-- Para estas dos variables de sesion -->
        <li>Fecha/Hora Inicio Sesion: <?=?></li>
        <li>Visitas Home: <?=$_SESSION['num_visitas_home']?></li>
    </ul>
    
</body>
</html>