<?php

include "class/class.calculadora.php";

$operador = $_POST['operador'];
$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];


$calculadora = new $calculadora();

switch ($operador) {
    case 'suma':
        $resultado = $calculadora->sumarValor($valor1, $valor2);
        break;
    case 'resta':
        $resultado = $calculadora->restarValor($valor1, $valor2);
        break;
    case 'multiplicacion':
        $resultado = $calculadora->multiplicaValor($valor1, $valor2);
        break;

        
    case 'potencia':
        $resultado = $calculadora->potenciaValor($valor1, $valor2);
        break;
    case 'division':
        if ($valor2 != 0) {
            $resultado = $calculadora->dividirValor($valor1, $valor2);
        } else {
            echo "Error: No se puede dividir por cero.";
            exit;
        }
        break;
}

?>