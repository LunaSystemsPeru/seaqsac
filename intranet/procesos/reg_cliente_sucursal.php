<?php
require '../clases/cl_cliente_sucursal.php';

$c_sucursal = new cl_cliente_sucursal();


$c_sucursal->setIdCliente(filter_input(INPUT_POST, 'hidden_id_cliente'));
$c_sucursal->setNombre(filter_input(INPUT_POST, 'input_nombre'));
$c_sucursal->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_sucursal->obtener_id();

if ($c_sucursal->insertar()) {
    header("Location: ../ver_clientes_sucursal.php?id_cliente=" . $c_sucursal->getIdCliente());
}