<?php
require '../clases/cl_cliente_sucursal.php';

$c_sucursal= new cl_cliente_sucursal();
$c_sucursal->setIdCliente(filter_input(INPUT_POST, 'id_cliente'));

$resultado = $c_sucursal->ver_sucursales_json();

echo $resultado;