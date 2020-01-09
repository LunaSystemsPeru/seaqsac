<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 13/07/19
 * Time: 12:26 PM
 */

require '../clases/Proveedor.php';
$c_proveedor = new Proveedor();

$c_proveedor->setRuc(filter_input(INPUT_POST, 'input_ruc'));
$c_proveedor->setRazonSocial(filter_input(INPUT_POST, 'input_razon_social'));
$c_proveedor->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_proveedor->setEmail(filter_input(INPUT_POST, 'input_correo'));
$c_proveedor->setTelefono(filter_input(INPUT_POST, 'input_telefono'));

$c_proveedor->obtener_id();

if ($c_proveedor->insertar()) {
    header("Location: ../ver_proveedores.php");
}