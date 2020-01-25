<?php
require  '../../models/BancoMovimiento.php';
require  '../../models/VentasCobro.php';
$bancoMovimiento=new BancoMovimiento();
$ventasCobro=new VentasCobro();


$ventasCobro->setIdVentas(filter_input(INPUT_GET, 'idV'));
$ventasCobro->setIdMovimiento(filter_input(INPUT_GET, 'idM'));
$bancoMovimiento->setIdMovimiento(filter_input(INPUT_GET, 'idM'));

if ($ventasCobro->eliminar()){
    if ($bancoMovimiento->eliminar()){
        echo '{ "resul":true}';
    }
}