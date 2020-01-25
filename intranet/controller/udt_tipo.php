<?php
require '../../models/TipoClasificacion.php';

$c_tipoclas = new TipoClasificacion();

$c_tipoclas->setId(filter_input(INPUT_POST,'id_tipo'));
$c_tipoclas->setNombre(filter_input(INPUT_POST,'input_desc'));
$c_tipoclas->setCodigo(filter_input(INPUT_POST,'select_cat'));

if ($c_tipoclas->actualizar())
{
    header("Location: ../contents/ver_tipos.php");
}
