<?php
/**
 * Ejemplo 06
 * 
 * Mostrar una imagen en pdf
 */

 // Importamos la libería FPDF
 require('fpdf/fpdf.php');
 //require('class/pdfArticulos.php');

$pdf = new FPDF();

$pdf->SetFont('Times', '', 10);
$pdf->AddPage();
$pdf->Image('Logo/Logo.png', 10, 5, 20);
$pdf->Output();