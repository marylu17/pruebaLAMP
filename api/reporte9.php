<?php
require("fpdf-1h/fpdf.php");
$pdf = new FPDF('L','cm','letter');
$pdf->settitle("codigo qr",true);
$pdf->setmargins(2,1.5,2);
$pdf->setautopagebreak(true,1.5);

$pdf->addpage();
$pdf->setfont('arial','',11); $pdf->settextcolor(0,0,0);
$pdf->cell(17.59,1,"Codigos QR",1,0,'L'); $pdf->ln();

$pdf->image("http://localhost:8080/proy15-kratos-v0/api/phpqrcode21/qrfpdf.php?text=rosa",1,1,4,4,'png');
$pdf->image("http://localhost:8080/proy15-kratos-v0/api/phpqrcode21/qrfpdf.php?text=como-estan",6,1,4,4,'png');
$pdf->image("http://localhost:8080/proy15-kratos-v0/api/phpqrcode21/qrfpdf.php?text=".urlencode("https://www.youtube.com/watch?v=_x4DHwj_NRk&list=RD_x4DHwj_NRk&start_radio=1"),1,6,9,9,'png');


$pdf->output();
?>