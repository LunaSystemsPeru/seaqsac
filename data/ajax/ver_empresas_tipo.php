<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 02/05/2019
 * Time: 08:17 PM
 */

require '../../models/Empresa.php';
$c_empresa = new Empresa();

$tipo = filter_input(INPUT_POST, 'input_tipo');

$c_empresa->setTipo($tipo);
$resultado = $c_empresa->ver_empresas_tipo();

echo $resultado;