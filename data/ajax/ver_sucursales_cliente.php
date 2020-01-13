<?php
require '../../models/modules.xml';

$c_sucursal= new ClienteSucursal();
$c_sucursal->setIdCliente(filter_input(INPUT_POST, 'id_cliente'));

$resultado = $c_sucursal->ver_sucursales_json();

echo $resultado;