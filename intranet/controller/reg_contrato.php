<?php
session_start();

require '../../models/Contrato.php';
require '../../tools/cl_varios.php';

$c_contrato = new Contrato();
$c_varios = new cl_varios();

$c_contrato->setFechaInicio(filter_input(INPUT_POST, 'input_fecha'));
$c_contrato->setFechaFin(filter_input(INPUT_POST, 'input_fecha'));
$c_contrato->setDuracion(filter_input(INPUT_POST, 'input_duracion'));
$c_contrato->setMontoPactado(filter_input(INPUT_POST, 'input_monto'));
$c_contrato->setServicio(filter_input(INPUT_POST, 'input_servicio'));
$c_contrato->setIdClasificacion(filter_input(INPUT_POST, 'select_tipo'));
$c_contrato->setIdProveedor(filter_input(INPUT_POST, 'hidden_id_proveedor'));

$c_contrato->obtener_id();

if ($c_contrato->insertar()) {
    header("Location: ../contents/ver_contrato.php");
}