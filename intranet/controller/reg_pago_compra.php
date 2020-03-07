<?php
require  '../../models/BancoMovimiento.php';
require  '../../models/CompraPago.php';
require  '../../models/Compra.php';
require  '../../models/Proveedor.php';

$bancoMovimiento=new BancoMovimiento();
$compraPago=new CompraPago();
$compra=new Compra();
$proveedor=new Proveedor();

$compra->setIdCompra(filter_input(INPUT_POST, 'idcompra'));
$compra->obtenerDatos();

$proveedor->setIdProveedor($compra->getIdProveedor());
$proveedor->obtener_datos();

$bancoMovimiento->obtener_id();
$bancoMovimiento->setFecha(filter_input(INPUT_POST, 'fecha'));
$bancoMovimiento->setDescripcion("Pago a ".$proveedor->getRazonSocial() . " x FACT: ". $compra->getSerie() . "-". $compra->getNumero());
$bancoMovimiento->setIdBanco(filter_input(INPUT_POST, 'banco'));
$bancoMovimiento->setIdTipo($compra->getTipoCompra());
$bancoMovimiento->setIngresa(0);
$bancoMovimiento->setSale(filter_input(INPUT_POST, 'monto'));
$compraPago->setIdCompra($compra->getIdCompra());
$compraPago->setIdMovimiento($bancoMovimiento->getIdMovimiento());
if ($bancoMovimiento->insertar()){
    if ($compraPago->insertar()){
        echo '{ "resul":true}';
    }
}
