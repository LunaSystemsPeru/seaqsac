<?php
require '../../models/Compra.php';
$compra=new Compra();

$compra->setIdCompra(filter_input(INPUT_GET, 'id'));

if ($compra->eliminar()){
    echo '{ "resul":true}';
}