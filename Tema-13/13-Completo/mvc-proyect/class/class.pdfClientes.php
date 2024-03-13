<?php


require('fpdf/fpdf.php');

class pdfClientes extends FPDF
{

    function __construct()
    {
        //Usamos el constructor de FPDF
        parent::__construct();

        //Añadimos una página
        $this->AddPage();

        //Invocamos al método titulo porque no es un método nativo
        $this->Titulo();
    }


    public function Header()
    {
        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Arial', 'B', 10);

        //Ancho de la página
        $anchoPagina = $this->GetPageWidth();

        //Gesbank 1.0 alineado a la izquierda
        $this->Cell(1, 10, iconv('UTF-8', 'ISO-8859-1', 'Gesbank - Clientes'), 0, 0, 'L');

        //Nombre en el centro
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Juan Jesus Muñoz Pérez'), 'B', 0, 'C');

        //Curso a la derecha
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', '2DAW 23/24'), 0, 1, 'R');

        //Salto de línea 
        $this->Ln(5);
    }

    public function Footer()
    {
        //Para el número del footer
        $this->AliasNbPages();

        //Posición vertical en -10
        $this->SetY(-10);

        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Arial', 'B', 10);

        //Escribimos el nómero de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 'T', 0, 'C');
    }

    public function Titulo()
    {
        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Courier', 'B', 12);

        //Ponemos color de fondo
        $this->SetFillColor(169, 223, 233);

        //Título
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Documento: Lista Clientes'), 0, 1, 'C', true);

        //Celda con la fecha y hora actual
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Fecha: ' . date('d/m/Y H:i')), 0, 1, 'C', true);

        //Salto de línea
        $this->Ln(5);
    }

    public function Cabecera()
    {

        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Courier', 'B', 12);

        //Ponemos color de fondo
        $this->SetFillColor(169, 223, 233);

        //Escribimos el texto
        $this->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', 'ID'), 'B', 0, 'R', true);
        $this->Cell(60, 7, iconv('UTF-8', 'ISO-8859-1', 'Cliente'), 'B', 0, 'C', true);
        $this->Cell(25, 7, iconv('UTF-8', 'ISO-8859-1', 'Teléfono'), 'B', 0, 'C', true);
        $this->Cell(35, 7, iconv('UTF-8', 'ISO-8859-1', 'Ciudad'), 'B', 0, 'C', true);
        $this->Cell(20, 7, iconv('UTF-8', 'ISO-8859-1', 'DNI'), 'B', 0, 'C', true);
        $this->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', 'Email'), 'B', 1, 'C', true);

        //Salto de línea
        $this->Ln(5);
    }

    function Contenido($clientes)
    {
        // Encabezado de la tabla
        $this->Cabecera();

        //Definimos el tamaño y el tipo de fuente
        $this->SetFont('Times', '',   10);

        foreach ($clientes as $cliente) {
            //Para hacer el salto de página vamos a usar dos métodos nativos de FPDF:
            //GetY: Pilla la posición del puntero, cómo hemos establecido el margen en 7, parará cuándo queden 7 mm de página
            //PageBreakTrigger: Detecta el margen de la página.
            //Si el puntero ha llegado a un margen, PageBreakTrigger se activará y crearemos una nueva página.
            if ($this->GetY() + 7 > $this->PageBreakTrigger) {
                //Definimos el tamaño y el tipo de fuente
                $this->AddPage();
                $this->Cabecera();
                $this->SetFont('Times', '',   10);
            }

            $this->Cell(10, 7, mb_convert_encoding($cliente->id, 'ISO-8859-1', 'UTF-8'), 0, 0, 'R');
            $this->Cell(60, 7, mb_convert_encoding($cliente->cliente, 'ISO-8859-1', 'UTF-8'), 0, 0, 'C');
            $this->Cell(25, 7, mb_convert_encoding($cliente->telefono, 'ISO-8859-1', 'UTF-8'), 0, 0, 'C');
            $this->Cell(35, 7, mb_convert_encoding($cliente->ciudad, 'ISO-8859-1', 'UTF-8'), 0, 0, 'C');
            $this->Cell(20, 7, mb_convert_encoding($cliente->dni, 'ISO-8859-1', 'UTF-8'), 0, 0, 'C');
            $this->Cell(40, 7, mb_convert_encoding($cliente->email, 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');
        }
    }
}
