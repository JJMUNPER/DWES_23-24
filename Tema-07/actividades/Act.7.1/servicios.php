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

if (isset($_SESSION['fecha_hora_visita'])){
    $fecha_hora = $_SESSION['fecha_hora_visita'];
} else  {
    $fecha_hora = date('d M Y H:i:s');
    $_SESSION['fecha_hora_visita'] = $fecha_hora;
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
    <h1>Numero Visitas: <?=$_SESSION['num_visitas_home']?></h1>
    <li>
        <ul>
            <a href="index.php">Home</a>
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
        <li>Página: Servicios</li>
        <li>SID: <?= session_id() ?></li>
        <li>Nombre Sesion: <?= session_name()?></li>
        <!-- Para estas dos variables de sesion -->
        <li>Fecha/Hora Inicio Sesion: <?= $_SESSION['fecha_hora_visita']?></li>
        <li>Visitas Home: <?= $_SESSION['num_visitas_home']?></li>
    </ul>
    
</body>
</html>