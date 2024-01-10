<?php

/*
    Contador de visitas
*/

session_start();

$visita_total = 0;

if (isset($_SESSION['num_visitas_home'])) {
    $visita_total += $_SESSION['num_visitas_home'];
}
if (isset($_SESSION['num_visitas_servicios'])) {
    $visita_total += $_SESSION['num_visitas_servicios'];
}
if (isset($_SESSION['num_visitas_eventos'])) {
    $visita_total += $_SESSION['num_visitas_eventos'];
}
if (isset($_SESSION['num_visitas_sobre'])) {
    $visita_total += $_SESSION['num_visitas_acercade'];
}


if (!isset($_SESSION['fecha_hora_visita'])) {
    $_SESSION['fecha_hora_visita'] = date("Y-m-d H:i:s");
}

$cierreSession = date("Y-m-d H:i:s");
$totalSession = strtotime($cierreSession) - strtotime($_SESSION['fecha_hora_visita']);
session_destroy();
session_unset();

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
        <li>Página: Close</li>
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
        <li>Visitas Totales:
            <?= $visita_total ?>
        </li>
        <li>Fecha/Hora Fin Sesion:
            <?= $cierreSession ?>
        </li>
        <li>Duracion Total Sesion:
            <?= $totalSession ?>
        </li>
    </ul>

</body>

</html>