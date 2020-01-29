<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 13/07/19
 * Time: 12:26 PM
 */

require '../../models/Proveedor.php';
$c_proveedor = new Proveedor();

$c_proveedor->setIdProveedor(filter_input(INPUT_POST, 'hidden_id_proveedor'));
$tipoAccion=strlen($c_proveedor->getIdProveedor())>0;
if ($tipoAccion){
    $c_proveedor->obtener_datos();
}

$c_proveedor->setRuc(filter_input(INPUT_POST, 'input_ruc'));
$c_proveedor->setRazonSocial(filter_input(INPUT_POST, 'input_razon_social'));
$c_proveedor->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_proveedor->setEmail(filter_input(INPUT_POST, 'input_correo'));
$c_proveedor->setTelefono(filter_input(INPUT_POST, 'input_telefono'));



if ($tipoAccion){
    $c_proveedor->modificar();
}else{
    $c_proveedor->obtener_id();
    $c_proveedor->insertar();
}
header("Location: ../contents/ver_proveedores.php");
/*if ($c_proveedor->insertar()) {
    header("Location: ../contents/ver_proveedores.php");
}*/