<?php
require '../../models/Gasto.php';
require '../../models/BancoMovimiento.php';

$c_gasto = new Gasto();
$c_movimiento = new BancoMovimiento();

$c_movimiento->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_movimiento->setDescripcion(filter_input(INPUT_POST, 'input_descripcion'));
$c_movimiento->setIdBanco(filter_input(INPUT_POST, 'select_banco'));
$c_movimiento->setIngresa(0);
$c_movimiento->setSale(filter_input(INPUT_POST, 'input_monto'));
$c_movimiento->setIdTipo(filter_input(INPUT_POST, 'select_tipo'));

$c_movimiento->obtener_id();

$c_gasto->setIdMovimiento($c_movimiento->getIdMovimiento());

$c_movimiento->insertar();
$c_gasto->insertar();

header("Location: ../contents/ver_gastos.php");