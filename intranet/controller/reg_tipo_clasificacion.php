<?php
require '../clases/TipoSubClase.php';

$c_tipo = new TipoSubClase();

$c_tipo->setNombre(filter_input(INPUT_POST, 'input_nombre'));
$c_tipo->setIdTipo(filter_input(INPUT_POST, 'hidden_id_tipo'));
$c_tipo->obtener_id();

if ($c_tipo->insertar()) {
    header("Location: ../ver_tipos_categoria.php?id_tipo=" . $c_tipo->getIdTipo());
}