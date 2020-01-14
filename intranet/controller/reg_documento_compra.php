<?php
require '../../models/Compra.php';

$c_compra = new Compra();

$c_compra->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_compra->setIdTido(filter_input(INPUT_POST, 'select_documento'));
$c_compra->setSerie(filter_input(INPUT_POST, 'input_serie'));
$c_compra->setNumero(filter_input(INPUT_POST, 'input_numero'));
$c_compra->setIdProveedor(filter_input(INPUT_POST, 'hidden_id_proveedor'));
$c_compra->setTipoCompra(filter_input(INPUT_POST, 'select_tipo'));
$c_compra->setTotal(filter_input(INPUT_POST, 'hidden_total'));

$c_compra->obtener_id();

$c_compra->setArchivo(filter_input(INPUT_POST, 'input_archivo'));

$c_compra->insertar();