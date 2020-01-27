<?php
require '../../models/Gasto.php';

$c_gasto = new Gasto();

$c_gasto->setIdMovimiento(filter_input(INPUT_GET,'id_movimiento'));

if ($c_gasto->eliminar())
{
    echo '{ "resul":true}';
}