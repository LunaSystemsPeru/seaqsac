<?php
require '../../models/OrdenServicio.php';

$c_orden = new OrdenServicio();

$c_orden->setIdOrden(filter_input(INPUT_GET, 'id_orden'));
echo $c_orden->obtener_datos();

