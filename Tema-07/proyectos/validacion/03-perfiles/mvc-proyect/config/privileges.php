<?php

/**
 * # Perfiles
 * 
 * 1. Administrador
 * 2. Editor
 * 3. Registrado
 * 
 * # Definir privilegios como variables globales
 */

//Declaracion variable global para los perfiles
//Aqui manejamos los perfiles tambien
$GLOBALS['alumno']['main'] = [1, 2, 3];
$GLOBALS['alumno']['new'] = [1, 2];
$GLOBALS['alumno']['edit'] = [1, 2];
$GLOBALS['alumno']['delete'] = [1];
$GLOBALS['alumnos']['show'] = [1, 2, 3];
$GLOBALS['alumnos']['filter'] = [1, 2, 3];
$GLOBALS['alumnos']['order'] = [1, 2, 3];




?>