<?php

$dni = filter_input(INPUT_POST, 'dni');
//$direcion = 'https://www.conmetal.pe/erp/ajax_post/consulta_ruc_nubefact.php?ruc=' . $ruc;
$direcion = 'http://lunasystemsperu.com/consultas_json/composer/consultas_dni_JMP.php?dni=' . $dni;

$json_ruc = file_get_contents($direcion, FALSE);
// Check for errors
if ($json_ruc === FALSE) {
    die('Error');
}

echo $json_ruc;

