<?php
require '../../models/OrdenInterna.php';

$c_orden = new OrdenInterna();

$a_resultado = $c_orden->ver_orden_cliente(filter_input(INPUT_POST, 'id_cliente'));

echo $a_resultado;
