<?php
require '../../models/DocumentoSunat.php';

$c_documento = new DocumentoSunat();

$c_documento->setIdTido(filter_input(INPUT_GET,'id_tido'));
$c_documento->setNombre(filter_input(INPUT_GET, 'input_desc'));
$c_documento->setCodSunat(filter_input(INPUT_GET,'input_codsu'));
$c_documento->setAbreviado(filter_input(INPUT_GET,'input_ncort'));

if ($c_documento->actualizar())
{
    header("Location: ../contents/ver_documentos_sunat.php");
}
