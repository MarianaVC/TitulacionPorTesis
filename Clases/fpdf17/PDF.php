<?php
require('fpdf.php');

class PDF extends FPDF
{
    public $titulo;
    public $contenido;
    public function _construct($titulo,$contenido){
        $this->titulo = $titulo;
        $this->contenido = $contenido;
    }
    public function genera(){
        $this->AliasNbPages();
        $this->AddPage('P','Letter');
        $this->SetFont('Times','',12);
        $this->Cell(0,10,$contenido,0,1);
        $this->Output();
        //return $this->
    }
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
        $this->Cell(30,10,$this->titulo,0,0,'C');
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
//$pdf=new PDF("hola","pequeño");
//$pdf->AliasNbPages();
//$pdf->AddPage();
//$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
//    $pdf->Cell(0,10,'Printing \n line number '.$i,0,1);
//$pdf->Output();
?>