<?php
require '../clases/cl_generales.php';

$c_general = new cl_generales();

$c_general->obtener_id();
$c_general->setNombre(filter_input(INPUT_POST, 'input_descripcion'));

if ($c_general->insertar()) {
    header("Location: ../ver_tipos_codigo.php");
}