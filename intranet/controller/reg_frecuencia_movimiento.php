<?php
require  '../../models/BancoMovimiento.php';
require  '../../models/PagosFrecuentesPagos.php';
require  '../../models/PagoFrecuente.php';
$bancoMovimiento=new BancoMovimiento();
$pagosFrecuentesPagos=new PagosFrecuentesPagos();
$pagoFrecuente=new PagoFrecuente();

$pagoFrecuente->setIdFrecuente(filter_input(INPUT_POST, 'id_pago'));
$pagoFrecuente->obtener_datos();

$bancoMovimiento->obtener_id();
$bancoMovimiento->setFecha(filter_input(INPUT_POST, 'fecha'));
$bancoMovimiento->setDescripcion("Pago de ".$pagoFrecuente->getServicio());
$bancoMovimiento->setIdBanco(filter_input(INPUT_POST, 'id_banco'));
$bancoMovimiento->setIdTipo($pagoFrecuente->getIdClasificacion());
$bancoMovimiento->setIngresa(0);
$bancoMovimiento->setSale(filter_input(INPUT_POST, 'monto'));

if ($bancoMovimiento->insertar()){
    $pagosFrecuentesPagos->setIdPagosFrecuentes($pagoFrecuente->getIdFrecuente());
    $pagosFrecuentesPagos->setIdMovimiento($bancoMovimiento->getIdMovimiento());
    if($pagosFrecuentesPagos->insertar()){
        header("Location: ../contents/ver_detalles_pagos_frecuentes.php?pago_f=".$pagoFrecuente->getIdFrecuente());
    }
}