<?php
require '../../../models/Compra.php';
$compra=new Compra();

$idCompra=filter_input(INPUT_GET, 'id');
$compra->setIdCompra($idCompra);
$listapagos =$compra->ver_pagos_compra();

foreach ($listapagos as $item){
    echo "<tr>
    <td>{$item['fecha']}</td>
    <td>{$item['nombre']}</td>
    <td >{$item['sale']}</td>
    <td><label onclick='eliminarPagoCompra({$item['id_compras']},{$item['id_movimiento']})'  style='cursor: pointer' class='badge badge-danger'>X</label>
    </td>
</tr>";
}

