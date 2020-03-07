<?php

require '../../models/OrdenServicio.php';
$c_orden = new OrdenServicio();

$c_orden->setIdOrden(filter_input(INPUT_GET, 'id_orden'));

if ($c_orden->eliminar()) {
    header("Location: ../contents/ver_orden_servicio.php");
}