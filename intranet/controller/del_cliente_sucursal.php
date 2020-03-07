<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 06:31 PM
 */

require '../../models/ClienteSucursal.php';

$c_sucursal = new ClienteSucursal();
$c_sucursal->setIdCliente(filter_input(INPUT_GET, 'id_cliente'));
$c_sucursal->setIdSucursal(filter_input(INPUT_GET, 'id_sucursal'));

if ($c_sucursal->eliminar()) {
    header("Location: ../contents/ver_clientes_sucursal.php?id_cliente=" . $c_sucursal->getIdCliente());
}