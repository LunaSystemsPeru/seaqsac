<?php
require '../../models/PagoFrecuente.php';
$pagoFrecuente=new PagoFrecuente();

$pagoFrecuente->setIdFrecuente(filter_input(INPUT_GET, 'idF'));

if ($pagoFrecuente->eliminar()){
        echo '{ "resul":true}';

}