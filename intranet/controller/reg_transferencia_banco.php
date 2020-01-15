<?php
require '../../models/BancoMovimiento.php';
require '../../models/Banco.php';

$c_movimiento = new BancoMovimiento();
$c_banco = new Banco();

//registrar salida de dinero
$c_banco->setIdBanco(filter_input(INPUT_POST, 'hidden_id_envia'));
$c_banco->obtener_datos();

$c_movimiento->obtener_id();
$c_movimiento->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_movimiento->setDescripcion("TRANSFERENCIA A " . strtoupper($c_banco->getNombre()));
$c_movimiento->setIngresa(0);
$c_movimiento->setSale(filter_input(INPUT_POST, 'input_monto'));
$c_movimiento->setIdTipo(18);
$c_movimiento->setIdBanco($c_banco->getIdBanco());
$c_movimiento->insertar();

$c_banco->setIdBanco(filter_input(INPUT_POST, 'select_otro_banco'));
$c_banco->obtener_datos();

$c_movimiento->obtener_id();
$c_movimiento->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_movimiento->setDescripcion("TRANSFERENCIA DESDE " . strtoupper($c_banco->getNombre()));
$c_movimiento->setIngresa(filter_input(INPUT_POST, 'input_monto'));
$c_movimiento->setSale(0);
$c_movimiento->setIdTipo(18);
$c_movimiento->setIdBanco($c_banco->getIdBanco());
$c_movimiento->insertar();

header("Location: ../contents/ver_bancos_movimientos.php?id_banco=". $c_banco->getIdBanco());
