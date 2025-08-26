<?php
require("fpdf-1h/fpdf.php");
$pdf = new FPDF('P','cm','letter');
$pdf->settitle("Carta",true);
$pdf->setmargins(2.5,2,2.5); 

$pdf->addpage();
$pdf->image("res/logo.png",1.5,1.5,3,0,'png');

$pdf->setfont('arial','B',8); 
$pdf->settextcolor(0,0,0);
$pdf->SetXY(5, 1.5);
$pdf->cell(0,0.5,"CLINICA: RENACER",0,0,'L'); 
$pdf->ln();
$pdf->SetX(5);
$pdf->cell(0,0.5,"CID: 78945",0,0,'L'); 
$pdf->ln(1);

$pdf->setfont('arial','B',12); 
$pdf->cell(16.59,0.5,"PERFIL PSICOLOGICO",0,0,'C'); 
$pdf->ln(2);

$pdf->image("res/qr.png",17,1.5,3,0,'png');

$pdf->setfont('arial','B',10); 
$pdf->cell(16.59,0.5,"Paciente: Ramon Valdez                                              Grupo sanguineo: ORH+",0,0,'L'); $pdf->ln();
$pdf->cell(16.59,0.5,"Fecha de nacimiento: 15/12/1945                                Genero: Masculino",0,0,'L'); $pdf->ln();
$pdf->cell(16.59,0.5,"Fecha de ingreso: 12/02/2023                                       Celular: 74859654",0,0,'L'); $pdf->ln(1);

$pdf->setfont('arial','',11);
$pdf->ln(1);

// Guardamos posición inicial de la primera tabla
$y_inicio = $pdf->GetY(); 

// TABLA 1
$pdf->cell(9,0.5,"CONDUCTA (SI/NO)",1,0,'C'); $pdf->ln();
$pdf->setfont('arial','',8);
$pdf->cell(7.5,0.5,"¿Usted se considera un persona agresiva?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Se considera un persona agresiva?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿La reunion de personas a su alrededor lo molestan?",1,0,'L');
$pdf->cell(1.5,0.5,"SI",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Considera que es mejor hacer las cosas solo?",1,0,'L');
$pdf->cell(1.5,0.5,"SI",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Te gusta trabjar en equipo?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Te molesta los espacios estrechos?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Te distraes con facilidad?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Te enfadas de forma rapida?",1,0,'L');
$pdf->cell(1.5,0.5,"SI",1,0,'R'); 

// TABLA 2 (colocada al lado derecho de la tabla 1)
$pdf->setfont('arial','',11);
$pdf->SetXY(12, $y_inicio); // <- cambiamos la posición en X a la derecha de la primera tabla
$pdf->cell(9,0.5,"ALIMENTACION",1,0,'C'); $pdf->ln();
$pdf->setfont('arial','',8);
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Que dieta sigue?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Alguna fruta te da energia?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Prefieres azucarado o salado?",1,0,'L');
$pdf->cell(1.5,0.5,"SI",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Menciona tu primer plato favorito?",1,0,'L');
$pdf->cell(1.5,0.5,"SI",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Menciona tu segundo plato favorito?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Menciona tu tercer plato favorito?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Cual es tu fueta favorita?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Te gustan las papas fritas?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln(2);

// TABLA 3
$pdf->cell(9,0.5,"SALUD",1,0,'C'); $pdf->ln();
$pdf->setfont('arial','',8);
$pdf->cell(7.5,0.5,"¿Cual es tu estatura actual?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Cual es tu peso actual?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Cuantas veces te da resfrio al año?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Sueles usar pastillas cuando te da resfrio?",1,0,'L');
$pdf->cell(1.5,0.5,"SI",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Cada cuanto haces ejercicio?",1,0,'L');
$pdf->cell(1.5,0.5,"SI",1,0,'R'); $pdf->ln();
$pdf->cell(7.5,0.5,"¿Que metabolismo tienes?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();

// TABLA 2 (colocada al lado derecho de la tabla 1)
$pdf->setfont('arial','',11);
$pdf->SetXY(12, 14); // <- cambiamos la posición en X a la derecha de la primera tabla
$pdf->cell(9,0.5,"EMOCINAL",1,0,'C'); $pdf->ln();
$pdf->setfont('arial','',8);
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Te consideras una persona sentimental?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Como fue el trato con tu padre?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Como fue el trato con tu madre?",1,0,'L');
$pdf->cell(1.5,0.5,"SI",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Te ilusionas rapido de una persona?",1,0,'L');
$pdf->cell(1.5,0.5,"SI",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Sentimientos o razon?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(7.5,0.5,"¿Te gustan los animales?",1,0,'L');
$pdf->cell(1.5,0.5,"NO",1,0,'R'); $pdf->ln(2);

$pdf->setfont('arial','B',12); 
$pdf->cell(16.59,0.5,"OBSERVACIONES",0,0,'L'); ;$pdf->ln();
$pdf->cell(7.5,0.5,"                                                                                                                                                  ",1,0,'L');$pdf->ln();

$pdf->ln(4);
$pdf->setfont('arial','',8);
$pdf->cell(2,0.3,"",0,0,'L'); $pdf->cell(4,0.3,".............................................",0,0,'C'); $pdf->ln();
$pdf->cell(2,0.3,"",0,0,'L'); $pdf->cell(4,0.3,"PACIENTE",0,0,'C'); $pdf->ln();
$pdf->cell(1,0.3,"",0,0,'L'); $pdf->cell(4,0.3,"Nombre:...................",0,0,'C'); $pdf->ln();
$pdf->cell(1,0.3,"",0,0,'L'); $pdf->cell(4,0.3,"Ci:...................",0,0,'C'); $pdf->ln();

$pdf->SetXY(12, 24);
$pdf->setfont('arial','',8);
$pdf->cell(2,0.3,"",0,0,'R'); $pdf->cell(4,0.3,".............................................",0,0,'C'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(2,0.3,"",0,0,'C'); $pdf->cell(4,0.3,"EVALUADOR",0,0,'C'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(2,0.3,"",0,0,'C'); $pdf->cell(4,0.3,"Doctor Chapatin",0,0,'C'); $pdf->ln();
$pdf->SetX(12);
$pdf->cell(2,0.3,"",0,0,'C'); $pdf->cell(4,0.3,"Ci:4655454 LP",0,0,'C'); $pdf->ln();


$pdf->output();
?>
