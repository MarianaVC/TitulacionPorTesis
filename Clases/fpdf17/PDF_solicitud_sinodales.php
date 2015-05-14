<?php
require('fpdf.php');
session_set_cookie_params(0);
session_start();
class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    $this->Image('fes.png',10,8,12);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //Title
    $this->Cell(30,10,'Solicitud de Sinodales',0,0,'C');
    //Line break
    $this->Ln(20);
}
 
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
//Instanciation of inherited class
$sinodales = $_SESSION['sinodales'];
//$sinodales = array(0 => "sinodal 0",1 => "sinodal 1",2 => "sinodal 2",3 => "sinodal 3",4 => "sinodal 4");
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=0;$i<5;$i++){
    $pdf->Cell(0,10,$sinodales[$i],0,1);
}
$pdf->Output();
?>