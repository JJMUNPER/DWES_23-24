<?php

include "class/class.vehiculo.php";

$coche_1 = new Vehiculo(); //Para crear un objeto

var_dump($coche_1); //Muestra las propiedades del objeto

var_dump($coche_1->getMatricula());

// $coche_1 -> modelo = "audi q5"; //No se le puede modificar pues el campo esta privado 

$coche_1->setModelo("audi Q5");
$coche_1->setNombre("Gama todo terreno, Audi");
$coche_1->setMatricula("1478 HRT");
$coche_1->setVelocidad(0);

$coche_1->aumentarVelocidad();

var_dump($coche_1);

//Crear un nuevo objeto y se le pasan los atributos

$coche_2 = new Vehiculo(
    "Auidi Q5",
    "Gama Off road, Auidi",
    "6998 BNP",
    0
);

var_dump($coche_2);


?>