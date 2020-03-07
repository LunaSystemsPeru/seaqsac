<?php

require '../../models/Banco.php';
require '../../models/BancoMovimiento.php';

$c_banco = new Banco();
$c_movimiento = new BancoMovimiento();

$c_banco->setNombre(filter_input(INPUT_POST, 'input_nombre'));
$c_banco->setNroCuenta(filter_input(INPUT_POST, 'input_cuenta'));
$c_banco->setMonto(0);
$c_banco->obtener_id();

$c_movimiento->obtener_id();
$c_movimiento->setFecha(date("Y-m") . "-01");
$c_movimiento->setIdTipo(10);
$c_movimiento->setSale(0);
$c_movimiento->setIngresa(filter_input(INPUT_POST, 'input_monto'));
$c_movimiento->setDescripcion("APERTURA DE CUENTA");
$c_movimiento->setIdBanco($c_banco->getIdBanco());

$c_banco->insertar();
if ($c_movimiento->getIngresa() > 0) {
    $c_movimiento->insertar();
}

header("Location: ../contents/ver_bancos.php");