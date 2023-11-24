<?php

    echo "ERROR BASE DE DATOS: ";
    echo "<HR>";
    echo "Mensaje: " . $e -> getMessage(). '<BR>';
    echo "Codigo e: " . $e -> getCode(). '<BR>';
    echo "Fichero: " . $e->getFile(). '<BR>';
    echo 'Linea: ' . $e->getLine(). '<BR>';
    echo 'Trace: ' . $e->getTraceAsString(). '<BR>';

    ?>