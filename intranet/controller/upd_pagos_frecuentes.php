<?php
require  '../../models/PagoFrecuente.php';
$pagoFrecuente=new PagoFrecuente();
$tipo = filter_input(INPUT_POST, 'type');
$pagoFrecuente->setIdFrecuente(filter_input(INPUT_POST, 'idPagoFre'));

if ($tipo == "d"){
    $pagoFrecuente->deternet();
     echo '{ "resul":true}';
}elseif($tipo == "p"){
    $pagoFrecuente->pasarMes();
    echo '{ "resul":true}';
}elseif($tipo == "m"){
    $pagoFrecuente->setFecha(filter_input(INPUT_POST, 'fecha'));
    $pagoFrecuente->setMontoPactado(filter_input(INPUT_POST, 'monto'));
    $pagoFrecuente->modificar();
    echo '{ "resul":true}';
}