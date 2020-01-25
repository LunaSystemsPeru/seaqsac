<?php

require  '../../models/BancoMovimiento.php';
require  '../../models/VentasCobro.php';
require  '../../models/Venta.php';
require  '../../models/OrdenServicio.php';

$bancoMovimiento=new BancoMovimiento();
$ventasCobro=new VentasCobro();
$venta=new Venta();
$ordenServicio=new OrdenServicio();

$venta->setIdVenta(filter_input(INPUT_POST, 'id_venta'));
$venta->obtener_datos();

$ordenServicio->setIdOrden($venta->getIdOrdenCliente());
$ordenServicio->obtener_datos();


$bancoMovimiento->obtener_id();
$bancoMovimiento->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$bancoMovimiento->setDescripcion("Pago de servicio de " . $ordenServicio->getDescripcion());
$bancoMovimiento->setIdBanco(filter_input(INPUT_POST, 'select_banco'));
$bancoMovimiento->setIdTipo(11);
$bancoMovimiento->setIngresa(filter_input(INPUT_POST, 'input_cobro'));
$bancoMovimiento->setSale(0);

$ventasCobro->setIdVentas($venta->getIdVenta());
$ventasCobro->setIdMovimiento($bancoMovimiento->getIdMovimiento());
if ($bancoMovimiento->insertar()){
    if ($ventasCobro->insertar()){
        header("Location: ../contents/ver_venta_cobro.php?venta=" . $venta->getIdVenta());
    }
}



