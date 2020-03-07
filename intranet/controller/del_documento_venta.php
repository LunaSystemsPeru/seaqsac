<?php
require '../../models/Venta.php';

$c_venta = new Venta();
$c_venta->setIdVenta(filter_input(INPUT_GET, 'id_venta'));

$c_venta->eliminar();

header("Location: ../contents/ver_ventas.php");