<?php
require("vendor\autoload.php");
$BDD = new mysqli("localhost","root","","kratosgym");
use PhpOffice\PhpSpreadsheet\SpreadSheet;
use PhpOffice\PhpSpreadsheet\Writer\XLsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="miexcel.xlsx"');

$excel=new SpreadSheet();
$excel->getProperties()->setCreator("Rosa")->setTitle("Mi excel");

$excel->setActiveSheetIndex(0);
$hoja=$excel->getActiveSheet();
$hoja->setTitle('mihoja1');
$hoja->setCellValue('C2','Lista de usuarios');
$hoja->getStyle('B6:E6')->getFont()->setbold(true);  
$hoja->setCellValue("B6",'#');
$hoja->setCellValue("C6",'Nombre');
$hoja->setCellValue("D6",'Apellido');
$hoja->setCellValue("E6",'Carnet');
$F=7;

$M=$BDD->query("select num,nom,ap,ci from user where std='act' ");
foreach($M as $V)
{
    $hoja->setCellValue("B$F",$V["num"]);
    $hoja->setCellValue("C$F",$V["nom"]);
    $hoja->setCellValue("D$F",$V["ap"]);
    $hoja->setCellValue("E$F",$V["ci"]);
    $F++;
}

$hoja->getStyle("B6:E$F")->applyFromArray(['borders'=>['allBorders'=>['borderStyle'=>Border::BORDER_THIN,'color'=>['argb'=>'FF000000'],]]]);

$img1 = new Drawing();     
$img1->setName('Logo tipo de la empresa');    
$img1->setDescription('Logotipo');  
$img1->setPath('res/logo.png');     
$img1->setWidth(50);     
$img1->setHeight(50);      
$img1->setCoordinates('B2');    
$img1->setWorksheet($hoja);   

$img2 = new Drawing();     
$img2->setName('Logo tipo de la empresa');    
$img2->setDescription('Logotipo');  
$img2->setPath('res/libro.jpg');     
$img2->setWidth(50);     
$img2->setHeight(50);      
$img2->setCoordinates('E2');    
$img2->setWorksheet($hoja);   

$wri= IOFactory::createWriter($excel, 'Xlsx');
$wri->save('php://output');

?>