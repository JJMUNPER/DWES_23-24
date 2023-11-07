<?php

/**
 * 
 * model.calcular.php
 * 
 * Permite operacion suma
 * 
 */

 #Cargo valores del formulario

 $valor1 = $_POST['valor1'];
 $valor2 = $_POST['valor2'];
 $operacion= $_POST['operacion'];


//Para probar que llegan bien los datos
//  print_r($_POST);
//  exit;

# Creo el objeto calculadora

 $calcular = new Calculadora($valor1, $valor2, $operacion, null);

 switch ($operacion) {
    case 'sumar': $calcular-> sumar(); break;
    case 'restar': $calcular->restar();break;
    case 'multiplicar': $calcular->multiplicar();break;
    case 'dividir': $calcular->dividir(); break;
    default: echo'Operación no válida'; break;
 }

 var_dump($calcular);

?>