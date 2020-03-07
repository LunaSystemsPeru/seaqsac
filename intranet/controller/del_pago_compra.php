<?php

require  '../../models/BancoMovimiento.php';
require  '../../models/CompraPago.php';
$bancoMovimiento=new BancoMovimiento();
$compraPago=new CompraPago();

$compraPago->setIdCompra(filter_input(INPUT_GET, 'idC'));
$compraPago->setIdMovimiento(filter_input(INPUT_GET, 'idM'));
$bancoMovimiento->setIdMovimiento(filter_input(INPUT_GET, 'idM'));

if ($compraPago->eliminar()){
    if ($bancoMovimiento->eliminar()){
        echo '{ "resul":true}';
    }
}