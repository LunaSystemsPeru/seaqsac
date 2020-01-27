<?php
require '../../models/Empresa.php';

$c_empresa = new Empresa();

$c_empresa->getIdEmpresa(filter_input(INPUT_GET,'id_empresas'));

if ($c_empresa->eliminar())
{
    echo '{ "resul":true}';
}
