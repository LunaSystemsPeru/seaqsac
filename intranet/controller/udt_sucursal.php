<?php
require '../../models/ClienteSucursal.php';

$c_sucursal = new ClienteSucursal();

$c_sucursal->setIdSucursal(filter_input(INPUT_POST, 'idsucursal'));
$c_sucursal->setIdCliente(filter_input(INPUT_POST, 'hidden_id_cliente'));
$c_sucursal->setNombre(filter_input(INPUT_POST, 'nombre'));
$c_sucursal->setDireccion(filter_input(INPUT_POST, 'direccion'));

if ($c_sucursal->actualizar()){
    echo '{ "resul":true}';
}

