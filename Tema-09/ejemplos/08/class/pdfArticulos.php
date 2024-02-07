<?php

class PdfArticulos extends FPDF{

    public function Header(){
        //Logo
        $this->Image('logo/logo.png', 10, 5, 20);
        $this->SetFont('Arial','B',10);
        //Subraya la cabecera
        $this->Cell(0,16,'Curtidos Mariana', 'B', 1, 'R');
        //salto de linea de 5mm
        $this->Ln(5);
    }

    public function Footer(){
        $this->SetY(-10);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0,10,'page' . $this->PageNo() . '/{nb}', 'T', 0, 'C');
    }


    public function Titulo(){
        $this->SetFont('Courier', 'B', 12);
        $this->SetFillColor(240);
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1','Listado Articulos'), 0, 0, 'C', true);
        $this->Ln(15);
    }

    public function Cabecera(){
        $this->SetFont('Courier', 'B', 10);
        $this->SetFillColor(240);
        //Total es: 210, tiene que ocupar 190
        $this->Cell(10, 7, iconv('UTF-8','ISO-8859-1','Id'), 'B', 0, 'R', true);
        $this->Cell(50, 7, iconv('UTF-8','ISO-8859-1','Descripcion'), 'B', 0, 'L', true);
        $this->Cell(30, 7, iconv('UTF-8','ISO-8859-1','Fabricante'), 'B', 0,  'L', true);
        $this->Cell(30, 7, iconv('UTF-8','ISO-8859-1','Categoria'), 'B', 0, 'L', true);
        $this->Cell(40, 7, iconv('UTF-8','ISO-8859-1','Etiquetas'), 'B', 0, 'L', true);
        $this->Cell(30, 7, iconv('UTF-8','ISO-8859-1','Precio'), 'B', 1, 'R', true);

    }
}


?>