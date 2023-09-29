<?php

    # Autor:Juan Jesus
    # Curso:2ºDaw

    /**
     *  ++Vista++
     *      Descripcion:
     *          +Muestra los datos del usuario
     */

     

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>
<body>
    <div>

        <h1>Actividad 1.6</h1>

        <table class="table" border="solid">
            <tr>
                <th> Nombre</th>
                <th> Apellidos</th>
                <th>Población</th>
                <th>Edad</th>
                <th> Ciclo</th>
                <th>Curso </th>
                <th>Modulo </th>
            </tr>
            <tr>
                <td><?= $nombre ?></td>
                <td><?= $apellidos ?></td>
                <td><?= $poblacion ?></td>
                <td><?= $edad ?></td>
                <td><?= $ciclo ?></td>
                <td><?= $curso ?></td>
                <td><?= $modulo ?></td>
            </tr>
        </table>

        <h3> Descripcion</h3>
        <p>
            Me llamo <?= $nombre ?> <?= $apellidos ?>, tengo <?= $edad ?> y vivo en <?= $poblacion ?> 
            Estudio <?= $modulo ?> en el curso <?= $curso ?> del <?= $ciclo ?>  en el instituto Los Remedios de Ubrique.

        </p>

    </div>
    
</body>
</html>



