<?php 

/**
 * Controlador:index.php 
 * Descripción: muestra los detalles de los artículos ordenados 
 */

include 'class/class.conexion.php';
include 'class/class.fp.php';

include 'models/modelIndex.php';

// Cargo la vista
include "views/viewIndex.php";



?>