<?php

require '../../../models/ClienteSucursal.php';

$clienteSucursal= new ClienteSucursal();

$clienteSucursal->setIdCliente(filter_input(INPUT_GET, 'id_cliente'));
$lista = $clienteSucursal->ver_sucursales();

foreach ($lista as  $item){
    echo "<option value='{$item['id_sucursal']}'> {$item['nombre']}</option>";
}
