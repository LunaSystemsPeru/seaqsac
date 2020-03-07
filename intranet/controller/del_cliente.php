<?php
require '../../models/Cliente.php';

$cliente = new Cliente();

$cliente->setIdCliente(filter_input(INPUT_GET,'id_cliente'));

if ($cliente->eliminar())
{
    echo '{ "resul":true}';
}