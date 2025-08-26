<?php
require("vendor/autoload.php");
use PhpOffice\PhpSpreadsheet\SpreadSheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="miexcel2.xlsx"');

$excel=new SpreadSheet();
$excel->getProperties()->setCreator("Stanley")->setTitle("Mi excel");

$excel->setActiveSheetIndex(0);
$hoja=$excel->getActiveSheet();
$hoja->setTitle('mihoja1');
$hoja->setCellValue('B2', 'PLANILLA DE SUELDO');
$hoja->Mergecells('B2:H2');
$hoja->getStyle('B2')->getFont()->setSize(25);
$hoja->getStyle('B2')->getFont()->setbold(true);
$hoja->getStyle('B2')->getFont()->setUnderline(Font::UNDERLINE_DOUBLE);
$hoja->getStyle('B2')->getFont()->getColor()->setARGB('FF008800');
$hoja->getStyle('B2')->getFont()->setName('Arial');
$hoja->getStyle('B2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$hoja->getStyle('B3:H2')->applyFromArray(['borders'=>['top'=>['borderStyle'=>Border::BORDER_THIN,'color'=>['argb'=>'0000FF']]]]);


$hoja->setCellValue('B3', 'Nombre y Apellidos');
$hoja->setCellValue('C3', 'Carnet');
$hoja->setCellValue('D3', 'Celular');
$hoja->setCellValue('E3', 'Sueldo');

$hoja->getColumnDimension('B')->setAutoSize(true);
$hoja->getColumnDimension('C')->setAutoSize(true);
$hoja->getColumnDimension('D')->setAutoSize(true);
$hoja->getColumnDimension('E')->setAutoSize(true);

$hoja->getRowDimension('3')->setRowHeight(100);
$hoja->getStyle('B3:E3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$hoja->getStyle('B3:E3')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$hoja->getStyle('B3:E3')->applyFromArray(['borders'=>['allBorders'=>['borderStyle'=>Border::BORDER_THIN,'color'=>['argb'=>'FFFF0000']]]]);
$hoja->getStyle('B3:E13')->applyFromArray(['borders'=>['allBorders'=>['borderStyle'=>Border::BORDER_MEDIUM,'color'=>['argb'=>'FF000000']]]]);

$hoja->getStyle('B3:E3')->applyFromArray(['borders'=>['allBorders'=>['borderStyle'=>Border::BORDER_MEDIUM,'color'=>['argb'=>'FF000000']]]]);

$img1= new Drawing();
$img1->setName('Mi Imagen');
$img1->setDescription('Mi descripcion');
$img1->setPath('res/logo.png');
$img1->setWidht(100);
$img1->setHeight(100);
$img1->setCoordinates('A1');
$img1->setWorksheet($hoja);

$wri = IOFactory::createWriter($excel,'Xlsx');
$wri->save('php://output');
?>
