<?php
require '../../models/Empresa.php';

$c_empresa = new Empresa();

$c_empresa->setRuc(filter_input(INPUT_POST, 'input_ruc'));
$c_empresa->setRazonSocial(filter_input(INPUT_POST, 'input_razon_social'));
$c_empresa->setComercial(filter_input(INPUT_POST, 'input_nombre_comercial'));
$c_empresa->setCondicion(filter_input(INPUT_POST, 'input_condicion'));
$c_empresa->setEstado(filter_input(INPUT_POST, 'input_estado'));
$c_empresa->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_empresa->setTipo(filter_input(INPUT_POST, 'radio_tipo'));
$c_empresa->obtener_id();

if ($c_empresa->insertar()) {
    header("Location: ../contents/ver_empresas.php");
}