<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // 10 alto 8 ancho y ubicacion
    $this->Image('fpdf/dibujo.png',10,11,16);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(20);
    // Título
    // ancho alto borde 1 o 0  /quiere que lo escriba a la derecha o salto de linea 0 1 2

    // C centar L LEFT R derecha
    $this->Cell(150,5,utf8_decode('Institución Educativa Wissen'),0,0,'L');
    $this->SetFont('Arial','',9);
    $this->Cell(90,5,utf8_decode('página ').$this->PageNo().' de {nb}',0,1,'R');
    $this->Cell(20);
    $this->SetFont('Arial','',15);
    $this->Cell(10,5,utf8_decode('Coordinación Academica'),0,1,'L');
    $this->Cell(20);
    $this->Cell(10,5,utf8_decode('Lista de Asistencia'),0,1,'L');
    // Salto de línea
    $this->Ln(10);
    
        
}



// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final Horizontal
    $this->SetY(-15);
    // Arial italic 8 I cursiva
    $this->SetFont('Arial','I',10);
    // Número de página  borde 0 sigueinte de corriedo text cente
    $this->Cell(0,10,utf8_decode('página ').$this->PageNo().'de {nb}',0,1,'C');
}
}

?>
