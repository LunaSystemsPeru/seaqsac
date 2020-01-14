<?php
session_start();
require '../../models/PagoFrecuente.php';

$c_frecuente = new PagoFrecuente();

$c_frecuente->setIdProveedor(filter_input(INPUT_POST, 'hidden_id_proveedor'));
$c_frecuente->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_frecuente->setMontoPactado(filter_input(INPUT_POST, 'input_monto'));
$c_frecuente->setServicio(filter_input(INPUT_POST, 'input_servicio'));
$c_frecuente->setFrecuencia(filter_input(INPUT_POST, 'select_frecuencia'));
$c_frecuente->setIdClasificacion(filter_input(INPUT_POST, 'select_tipo'));

$c_frecuente->obtener_id();

if ($c_frecuente->insertar()) {
    header("Location: ../contents/ver_pagos_frecuentes.php");
}