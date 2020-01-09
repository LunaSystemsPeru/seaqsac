<?php
require '../clases/cl_tipos.php';

$c_tipo = new cl_tipos();

$c_tipo->obtener_id();
$c_tipo->setNombre(filter_input(INPUT_POST, 'input_descripcion'));
$c_tipo->setCodigo(filter_input(INPUT_POST, 'select_categoria'));

if ($c_tipo->insertar()) {
    header("Location: ../ver_tipos.php");
}