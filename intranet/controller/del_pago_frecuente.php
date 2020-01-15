<?php

require  '../../models/PagoFrecuente.php';
$pagoFrecuente=new PagoFrecuente();

$pagoFrecuente->setIdFrecuente(filter_input(INPUT_POST, 'id_pago'));


$pagoFrecuente->eliminar();
echo '{ "resul":true}';