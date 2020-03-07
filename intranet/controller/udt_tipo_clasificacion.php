<?php
require '../../models/TipoSubClase.php';

$c_tipo = new TipoSubClase();

$c_tipo->setIdClase(filter_input(INPUT_POST, 'id_subc'));
$c_tipo->setIdTipo(filter_input(INPUT_POST, 'hidden_id_tipo'));
$c_tipo->setNombre(filter_input(INPUT_POST, 'input_nom'));

if ($c_tipo->actualizar()){

    header("Location: ../contents/ver_tipos_categoria.php?id_tipo=" . $c_tipo->getIdTipo());
}
