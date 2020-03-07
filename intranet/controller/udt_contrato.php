<?php
session_start();

require '../../models/Contrato.php';
require '../../tools/cl_varios.php';

$c_contrato = new Contrato();
$c_varios = new cl_varios();


$c_contrato->setIdContrato(filter_input(INPUT_POST, 'id_contrato'));
$c_contrato->setFechaInicio(filter_input(INPUT_POST, 'fecha_inicio'));
$c_contrato->setDuracion(filter_input(INPUT_POST, 'duracion'));
$c_contrato->setMontoPactado(filter_input(INPUT_POST, 'total_pactado'));
$c_contrato->setServicio(filter_input(INPUT_POST, 'servicio'));
$c_contrato->setIdClasificacion(filter_input(INPUT_POST, 'id_tipo'));


if ($c_contrato->modificar()) {
    header("Location: ../contents/ver_detalle_contrato.php?contrato=".$c_contrato->getIdContrato());
}