<?php

require  '../../models/BancoMovimiento.php';
require '../../models/ContratoPago.php';
$bancoMovimiento=new BancoMovimiento();
$contratoPago = new ContratoPago();

$contratoPago->setIdContrato(filter_input(INPUT_GET, 'idC'));
$contratoPago->setIdMovimiento(filter_input(INPUT_GET, 'idM'));
$bancoMovimiento->setIdMovimiento(filter_input(INPUT_GET, 'idM'));

if ($contratoPago->eliminar()){
    if ($bancoMovimiento->eliminar()){
        echo '{ "resul":true}';
    }
}
