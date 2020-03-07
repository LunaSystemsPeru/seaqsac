<?php
require  '../../models/BancoMovimiento.php';
require  '../../models/PagosFrecuentesPagos.php';
$bancoMovimiento=new BancoMovimiento();
$pagosFrecuentesPagos=new PagosFrecuentesPagos();

$pagosFrecuentesPagos->setIdPagosFrecuentes(filter_input(INPUT_GET, 'id_pago'));
$pagosFrecuentesPagos->setIdMovimiento(filter_input(INPUT_GET, 'id_movimiento'));

$bancoMovimiento->setIdMovimiento($pagosFrecuentesPagos->getIdMovimiento());
$pagosFrecuentesPagos->eliminar();
$bancoMovimiento->eliminar();

header("Location: ../contents/ver_detalles_pagos_frecuentes.php?pago_f=".$pagosFrecuentesPagos->getIdPagosFrecuentes());