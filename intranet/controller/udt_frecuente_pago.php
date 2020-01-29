<?php
session_start();
require '../../models/PagoFrecuente.php';

$c_frecuente = new PagoFrecuente();

$c_frecuente->setIdFrecuente(filter_input(INPUT_POST, 'id_pagofrecuente'));

$c_frecuente->setFecha(filter_input(INPUT_POST, 'fecha_inicio'));
$c_frecuente->setMontoPactado(filter_input(INPUT_POST, 'total_pactado'));
$c_frecuente->setServicio(filter_input(INPUT_POST, 'servicio'));
$c_frecuente->setFrecuencia(filter_input(INPUT_POST, 'frecuencia'));
$c_frecuente->setIdClasificacion(filter_input(INPUT_POST, 'id_tipo'));


if ($c_frecuente->actualizar()) {
    header("Location: ../contents/ver_detalle_pago_frecuente.php?pago_f=" . $c_frecuente->getIdFrecuente());
}

