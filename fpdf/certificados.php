<?php
 require('fpdf.php');

 class PDF extends FPDF {
  // Cabecera de página
  function Header() {
   // Logo
   $this->Image('fpdf/blackW.png',80,15,50);
   $this->Image('fpdf/firma2.png',20,200,90);
   // Arial bold 15
   $this->SetFont('Arial','B',15);
   // Movernos a la derecha
   $this->Cell(90);

   // Título
   $this->Cell(12,55,'REGIONAL CUNDINAMARCA',0,0,'C');
   // Salto de línea
   $this->Ln(20);
   $this->Cell(190,55,'LA INSTITUCION ESDUCATIVA WISSEN',0,0,'C');
   $this->Ln(20);
   $this->Cell(186,55,'CERTIFICA',0,0,'C');
  }

  // Pie de página
  function Footer() {
   // Posición: a 1,5 cm del final
   $this->SetY(-15);
   // Arial italic 8
   $this->SetFont('Arial','I',8);
   // Número de página
   $this->Cell(0,10,utf8_decode('pagina').$this->PageNo().'/{nb}',0,0,'C');//priemr 0 es borde
  }
 }
 

?>