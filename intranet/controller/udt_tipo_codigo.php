<?php
require '../../models/TipoGeneral.php';

$c_tipo = new TipoGeneral();

$c_tipo->setId(filter_input(INPUT_POST, 'id_tipo'));
$c_tipo->setNombre(filter_input(INPUT_POST, 'input_descripcion'));

if ($c_tipo->actualizar()){

    header("Location: ../contents/ver_tipos_codigo.php");
}

