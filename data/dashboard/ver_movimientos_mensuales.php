<?php
require '../../models/BancoMovimiento.php';

$movimiento = new BancoMovimiento();

echo $movimiento->verMovimientosMensuales();