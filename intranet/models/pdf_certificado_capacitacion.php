<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 04/05/2019
 * Time: 10:32 AM
 */
if (is_null(filter_input(INPUT_GET, 'id_capacitacion'))) {
    header("Location: ../ver_capacitaciones_clientes.php");
}

require('../clases_varios/fpdf/rotations.php');
require('../clases_varios/cl_varios.php');
$c_varios = new cl_varios();
define('FPDF_FONTPATH', '../clases_varios/fpdf/font/');

require '../clases/cl_capacitacion.php';
require '../clases/cl_capacitacion_asistente.php';

$c_capacitacion = new cl_capacitacion();
$c_capacitacion->setIdCapacitacion(filter_input(INPUT_GET, 'id_capacitacion'));
$c_capacitacion->obtener_datos();

setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
$d = $c_capacitacion->getFecha();
$fecha = strftime("%d de %B de %Y", strtotime($d));

$d2 = date("Y-m-d");
$fecha2 = strftime("%d de %B de %Y", strtotime($d2));

$c_asistente = new cl_capacitacion_asistente();
$c_asistente->setIdCapacitacion($c_capacitacion->getIdCapacitacion());
$c_asistente->setIdAsistente(filter_input(INPUT_GET, 'id_asistente'));
$c_asistente->obtener_datos();

$codigo = $c_capacitacion->getIdCapacitacion() . $c_capacitacion->getIdCliente() . $c_capacitacion->getIdTipo() . $c_asistente->getIdAsistente();

class PDF extends PDF_Rotate
{
    function RotatedText($x, $y, $txt, $angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }
}


$pdf = new PDF('L', 'mm', 'A4');
$pdf->SetMargins(14, 14, 14);
$pdf->SetAutoPageBreak(true, 10);
$pdf->AddPage();

$imagen = "../images/fondo_seaq.png";
$pdf->Image($imagen, 0, 0, 297, 210);

$pdf->SetY(70);
$pdf->SetFont('Times', '', 24);
$pdf->Cell(269, 10, "Certifica que", 0, 1, "C");

$pdf->SetY(90);
$pdf->SetFont('Times', '', 36);
$pdf->Cell(269, 10, ucwords(strtolower($c_asistente->getDatos())), 0, 1, "C");


$pdf->Ln(15);
$pdf->SetFont('Times', '', 18);
$pdf->MultiCell(269, 8, utf8_decode("Ha aprobado satisfactoriamente el curso: Brigada de Emergencia realizado el día " . $fecha . ", con " . $c_varios->zerofill($c_capacitacion->getTotHoras(), 2) . " horas de capacitación teórico-prácticas."), 0, "J");
$pdf->Ln(3);
$pdf->Cell(269, 10, strtoupper("TEMA: " . $c_capacitacion->getNombre()), 0, 1, "L");

$pdf->Ln(5);
$pdf->SetFont('Times', '', 14);
$pdf->Cell(269, 10, "Lima, " . $fecha2, 0, 1, "R");

$pdf->Ln(10);
$pdf->SetFont('Times', '', 18);
$pdf->Cell(100, 7, "Ing. Kristhian Garcia Fiestas", 0, 1, "C");
$pdf->Cell(100, 7, "Expositor", 0, 1, "C");

$pdf->SetFont('Arial', '', 8);
$pdf->RotatedText(283,60,"Codigo: " . $codigo,90);

$pdf->Output();