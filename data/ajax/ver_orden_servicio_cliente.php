<?php
require '../../models/OrdenServicio.php';

$c_orden = new OrdenServicio();

$c_orden->setIdCliente(filter_input(INPUT_POST, 'id_cliente'));
$a_resultado = $c_orden->ver_orden_cliente();

echo $a_resultado;
