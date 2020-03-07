<?php

require  '../../models/BancoMovimiento.php';
require '../../models/PagosFrecuentesPagos.php';
$bancoMovimiento=new BancoMovimiento();
$pagosFrecuentesPagos = new PagosFrecuentesPagos();

$pagosFrecuentesPagos->setIdPagosFrecuentes(filter_input(INPUT_GET, 'idF'));
$pagosFrecuentesPagos->setIdMovimiento(filter_input(INPUT_GET, 'idM'));
$bancoMovimiento->setIdMovimiento(filter_input(INPUT_GET, 'idM'));

if ($pagosFrecuentesPagos->eliminar()){
    if ($bancoMovimiento->eliminar()){
        echo '{ "resul":true}';
    }
}