<?php
/**
 * Ejemplo 06
 * 
 * Mostrar una imagen en pdf
 */

 // Cargamos clase fpdf
 require('fpdf/fpdf.php');
 require('class/pdfArticulos.php');
 require('datos/articulos.php');

$pdf = new PdfArticulos();

$pdf->AliasNbPages();// Establece el alias para el número de páginas total
$pdf->AddPage();
$pdf->SetFont('Courier', '',10);

# Muestro el titulo del documento
$pdf->Titulo();

# Muestro cabecera del listado
$pdf->Cabecera();

# Muestro los detalles del articulo
foreach ($articulos as $articulo) {
    $pdf->Cell(10, 7, iconv('UTF-8','ISO-8859-1',$articulo['id']),'B', 0, 'R');
    $pdf->Cell(50, 7, iconv('UTF-8','ISO-8859-1',$articulo['Descripcion']), 'B', 0, 'L');
    $pdf->Cell(30, 7, iconv('UTF-8','ISO-8859-1',$articulo['Fabricante']), 'B', 0, 'L');
    $pdf->Cell(32, 7, iconv('UTF-8','ISO-8859-1',$articulo['Categoria']), 'B', 0, 'L');
    $pdf->Cell(40, 7, iconv('UTF-8','ISO-8859-1',implode(', ', $articulo['Etiquetas'])), 'B', 0, 'L');
    $pdf->Cell(28, 7, iconv('UTF-8','ISO-8859-1',$articulo['Precio']), 'B', 1, 'R');
}


$pdf->Output();