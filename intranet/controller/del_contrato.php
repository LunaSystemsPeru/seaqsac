<?php
require '../../models/Contrato.php';

$contrato = new Contrato();

$contrato->setIdContrato(filter_input(INPUT_GET,'idC'));

if ($contrato->eliminar())
{
    echo '{ "resul":true}';
}