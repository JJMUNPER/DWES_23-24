<?php

/*
    Contador de visitas
*/

session_start();

if (isset($_SESSION['num_visitas_acercade'])) {
    $_SESSION['num_visitas_acercade']++;
} else {
    $_SESSION['num_visitas_acercade'] = 1;
}

if (!isset($_SESSION['fecha_hora_visita'])) {
    $_SESSION['fecha_hora_visita'] = date("Y-m-d H:i:s");
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
        <li>Página: A cerca de</li>
        <li>SID:
            <?= session_id() ?>
        </li>
        <li>Nombre Sesion:
            <?= session_name() ?>
        </li>
        <!-- Para estas dos variables de sesion -->
        <li>Fecha/Hora Inicio Sesion:
            <?= $_SESSION['fecha_hora_visita'] ?>
        </li>
        <li>Visitas Acercade:
            <?= $_SESSION['num_visitas_acercade'] ?>
        </li>
    </ul>

</body>

</html>