<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 06:31 PM
 */

require '../clases/cl_cliente_sucursal.php';

$c_sucursal = new cl_cliente_sucursal();
$c_sucursal->setIdCliente(filter_input(INPUT_GET, 'id_cliente'));
$c_sucursal->setIdSucursal(filter_input(INPUT_GET, 'id_sucursal'));

if ($c_sucursal->eliminar()) {
    header("Location: ../ver_clientes_sucursal.php?id_cliente=" . $c_sucursal->getIdCliente());
}