<?php
require("fpdf-1h/fpdf.php");
$pdf = new FPDF('L','cm','letter');
$pdf->settitle("codigo barras",true);
$pdf->setmargins(2,1.5,2);
$pdf->setautopagebreak(true,1.5);

$pdf->addpage();
$pdf->setfont('arial','',11); $pdf->settextcolor(0,0,0);
$pdf->cell(17.59,1,"Codigos QR",1,0,'L'); $pdf->ln();

$pdf->image("http://localhost:8080/proy15-kratos-v0/api/barcode/barcode.php?text=123&size=50&sizefactor=2",1,1,0,0,'png');


$pdf->output();
?>