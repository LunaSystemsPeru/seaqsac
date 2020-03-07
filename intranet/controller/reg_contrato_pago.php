<?php
session_start();

require '../../models/ContratoPago.php';
require '../../models/Contrato.php';
require '../../models/BancoMovimiento.php';

$c_contrato = new Contrato();
$c_pago = new ContratoPago();
$c_movimiento = new BancoMovimiento();

$c_contrato->setIdContrato(filter_input(INPUT_POST, 'id_contrato'));
$c_contrato->obtener_datos();

$c_movimiento->setIdBanco(filter_input(INPUT_POST, 'id_banco'));
$c_movimiento->setFecha(filter_input(INPUT_POST, 'fecha'));
$c_movimiento->setDescripcion("PAGO DE CONTRATO DE " . $c_contrato->getServicio());
$c_movimiento->setIngresa(0);
$c_movimiento->setSale(filter_input(INPUT_POST, 'monto'));
$c_movimiento->setIdTipo($c_contrato->getIdClasificacion());
$c_movimiento->obtener_id();

$c_pago->setIdContrato($c_contrato->getIdContrato());
$c_pago->setIdMovimiento($c_movimiento->getIdMovimiento());

$c_movimiento->insertar();
$c_pago->insertar();

header("Location: ../contents/ver_detalle_contrato.php?contrato=" . $c_contrato->getIdContrato());
