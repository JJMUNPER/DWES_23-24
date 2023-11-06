<?php

include "class/class.calculadora.php";

$calculadora = new calculadora(); //Creo Objeto

// var_dump($calculadora);

//Suma
$calculadora->setValor1(8);
$calculadora->setValor2(6);
var_dump($calculadora->sumarValor());

//Resta
$calculadora->setValor1(6);
$calculadora->setValor2(10);
var_dump($calculadora->restarValor());

//Multiplicacion
$calculadora->setValor1(14);
$calculadora->setValor2(7);
var_dump($calculadora->multiplicaValor());

//Division
$calculadora->setValor1(50);
$calculadora->setValor2(2);
var_dump($calculadora->dividirValor());

//Potencia
$calculadora->setValor1(4);
$calculadora->setValor2(3);
var_dump($calculadora->potenciaValor());


?>