<?php
require '../../models/Proveedor.php';
$c_proveedor = new Proveedor();

$searchTerm = (filter_input(INPUT_GET, 'term'));
$array = $c_proveedor->ver_filas_busqueda($searchTerm);

$a_resultado = array();
foreach ($array as $fila) {
    $a_json_row['value'] = $fila['razon_social'] . " | " . $fila['ruc'];
    $a_json_row['datos'] = $fila['razon_social'];
    $a_json_row['direccion'] = $fila['direccion'];
    $a_json_row['codigo'] = $fila['id_proveedores'];
    array_push($a_resultado, $a_json_row);
}

print_r(json_encode($a_resultado));
flush();