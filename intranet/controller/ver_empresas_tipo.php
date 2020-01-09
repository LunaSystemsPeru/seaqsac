<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 02/05/2019
 * Time: 08:17 PM
 */

require '../clases/cl_empresa.php';
$c_empresa = new cl_empresa();

$tipo = filter_input(INPUT_POST, 'input_tipo');

$c_empresa->setTipo($tipo);
$resultado = $c_empresa->ver_empresas_tipo();

echo $resultado;