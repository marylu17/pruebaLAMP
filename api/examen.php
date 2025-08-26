<?php
require("vendor/autoload.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

// Encabezado descarga
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="analisis_costo_ropero.xlsx"');
header('Cache-Control: max-age=0');

$excel = new Spreadsheet();
$hoja = $excel->getActiveSheet();
$hoja->setTitle('Costos');

// Colores
$azul = '2F75B5';
$amar = 'FFFF00';

// ---- Título principal
$hoja->setCellValue('B2', 'ANALISIS DE COSTO ROPERO');
$hoja->mergeCells('B2:D2');
$hoja->getStyle('B2')->getFont()->setBold(true)->setSize(14);

// Celda del TOTAL GLOBAL en E2
$hoja->setCellValue('E2', "");
$hoja->getStyle('E2')->getFont()->setBold(true)->setSize(12);
$hoja->getStyle('E2')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);

$f = 4;

// ======================
// Función título bloque
// ======================
function tituloBloque($hoja,$fila,$texto,$color){
    $hoja->setCellValue("B$fila",$texto);
    $hoja->mergeCells("B$fila:D$fila");
    $hoja->getStyle("B$fila")->getFill()->setFillType(Fill::FILL_SOLID)
         ->getStartColor()->setARGB($color);
    $hoja->getStyle("B$fila")->getFont()->setBold(true)->setSize(12)
         ->getColor()->setARGB('FFFFFFFF');
    $hoja->getStyle("B$fila")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
}

// ======================
// MATERIA PRIMA
// ======================
tituloBloque($hoja,$f,"MATERIA PRIMA",$azul); $f++;

$materia = [
    ["Laminas de melamina",1,380],
    ["Carril para cajon",8,200],
    ["Carril para puerta",2,30],
];
$ini=$f;
foreach($materia as $row){
    $hoja->setCellValue("B$f",$row[0]);
    $hoja->setCellValue("E$f",$row[1]);
    $hoja->getStyle("B$f:E$f")->getFill()->setFillType(Fill::FILL_SOLID)
         ->getStartColor()->setARGB($amar);
    $f++;
}
$hoja->setCellValue("E$f","=SUM(E$ini:E".($f-1).")"); // total materia prima
$totMP=$f;
$f+=2;

// ======================
// COSTOS INDIRECTOS
// ======================
tituloBloque($hoja,$f,"COSTOS INDIRECTOS DE FABRICACION",$azul); $f++;

$indirectos = [
    ["Tornillos",8,4],
    ["Tarugos",8,2.4],
    ["Carpicol",1,3],
    ["Energia electrica",1,20],
];
$ini=$f;
foreach($indirectos as $row){
    $hoja->setCellValue("B$f",$row[0]);
    $hoja->setCellValue("E$f",$row[1]);
    $hoja->getStyle("B$f:E$f")->getFill()->setFillType(Fill::FILL_SOLID)
         ->getStartColor()->setARGB($amar);
    $f++;
}
$hoja->setCellValue("E$f","=SUM(E$ini:E".($f-1).")");
$totCI=$f;
$f+=2;

// ======================
// MANO DE OBRA
// ======================
tituloBloque($hoja,$f,"MANO DE OBRA",$azul); $f++;

$hoja->setCellValue("B$f","Obreros");
$hoja->setCellValue("E$f",2,240);
$hoja->getStyle("B$f:E$f")->getFill()->setFillType(Fill::FILL_SOLID)
     ->getStartColor()->setARGB($amar);
$f++;
$hoja->setCellValue("E$f","=E".($f-1));
$totMO=$f;

// ======================
// TOTAL GLOBAL
// ======================
$f++;
$hoja->setCellValue("E$f","=E$totMP+E$totCI+E$totMO");

// Poner el total global en E2
$hoja->setCellValue("E2","=E$f");

// Ajuste de columnas
foreach(['B','E'] as $c){
    $hoja->getColumnDimension($c)->setAutoSize(true);
}

$writer = IOFactory::createWriter($excel,'Xlsx');
$writer->save('php://output');
exit;
