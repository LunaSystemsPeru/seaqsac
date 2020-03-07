<?php

require '../../models/BancoMovimiento.php';
require '../../models/PagosFrecuentesPagos.php';
require '../../models/PagoFrecuente.php';
require '../../models/Proveedor.php';

$bancoMovimiento = new BancoMovimiento();
$pagosFrecuentesPagos = new PagosFrecuentesPagos();
$pagoFrecuente = new PagoFrecuente();
$proveedor = new Proveedor();

$pagoFrecuente->setIdFrecuente(filter_input(INPUT_POST, 'id_pagofrecuente'));
$pagoFrecuente->obtener_datos();

$proveedor->setIdProveedor($pagoFrecuente->getIdProveedor());
$proveedor->obtener_datos();

$bancoMovimiento->obtener_id();
$bancoMovimiento->setFecha(filter_input(INPUT_POST, 'fecha'));
$bancoMovimiento->setDescripcion("Pago del servicio de " . $pagoFrecuente->getServicio() );
$bancoMovimiento->setIdBanco(filter_input(INPUT_POST, 'id_banco'));
$bancoMovimiento->setIdTipo($pagoFrecuente->getIdClasificacion());
$bancoMovimiento->setIngresa(0);
$bancoMovimiento->setSale(filter_input(INPUT_POST, 'monto'));

$pagosFrecuentesPagos->setIdPagosFrecuentes($pagoFrecuente->getIdFrecuente());
$pagosFrecuentesPagos->setIdMovimiento($bancoMovimiento->getIdMovimiento());

if ($bancoMovimiento->insertar()) {
    if ($pagosFrecuentesPagos->insertar()) {
        header("Location: ../contents/ver_detalle_pago_frecuente.php?pago_f=".$pagoFrecuente->getIdFrecuente() );
    }
}