<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Incluimos el archivo fpdf
require_once APPPATH."/third_party/fpdf/fpdf.php";

//Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
class Pdf extends FPDF {
    public function __construct() {
        parent::__construct();
    }
    // El encabezado del PDF
    public function Header(){
        //$this->Image(base_url().'/assets/imagenes/logo.png',10,8,22);
        /*$this->SetFont('Arial','',8);

        $this->Line(5,5,70,5);
        $this->Line(5,20,70,20);
        $this->Line(5,5,5,20);
        $this->Line(70,5,70,20);
        
        $this->Cell(55,0,'FACTURA POR TERCEROS',0,0,'C');
        $this->Ln('5');
        $this->SetFont('Arial','',8);
    
        $this->Cell(55,2,'PHARMA ZERO',0,0,'C');
        $this->Ln(10);*/
    }
    // El pie del pdf
    public function Footer(){
        /*$this->SetY(-45);
        $this->SetFont('Arial','B',8);
        $this->Cell(0,10,'"ESTA FACTURA CONTRIBUYE AL DESARROLLO ',0,0,'C');
        $this->Ln('5');
        $this->Cell(0,10,utf8_decode('DEL PAIS. EL USO ILICITO DE ESTA SERÁ '),0,0,'C');
        $this->Ln('5');
        $this->Cell(0,10,'SANCIONADO DE ACUERDO A LEY"',0,0,'C');

        $this->SetFont('Arial','',8);
        $this->Ln('10');        
        $this->Cell(0,10,'No reembolsable',0,0,'C');
        $this->Ln('5');
        $this->Cell(0,10,'GRACIAS POR SU PREFERENCIA',0,0,'C');

        $this->SetFont('Arial','B',8);
        $this->Ln('10');
        $this->Cell(0,10,'"system PHARMA ZERO"',0,0,'C');*/
    }
}