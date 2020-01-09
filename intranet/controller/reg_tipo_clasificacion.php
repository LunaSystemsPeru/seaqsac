<?php
require '../clases/cl_tipo_subclase.php';

$c_tipo = new cl_tipo_subclase();

$c_tipo->setNombre(filter_input(INPUT_POST, 'input_nombre'));
$c_tipo->setIdTipo(filter_input(INPUT_POST, 'hidden_id_tipo'));
$c_tipo->obtener_id();

if ($c_tipo->insertar()) {
    header("Location: ../ver_tipos_categoria.php?id_tipo=" . $c_tipo->getIdTipo());
}