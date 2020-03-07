<?php
require '../../models/Proveedor.php';

$proveedor = new Proveedor();
$proveedor->setIdProveedor(filter_input(INPUT_GET, 'idP'));

if ($proveedor->eliminar()) {
    echo '{ "resul":true}';
}