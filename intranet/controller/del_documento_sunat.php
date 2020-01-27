<?php
require '../../models/DocumentoSunat.php';

$c_documento = new DocumentoSunat();

$c_documento->setIdTido(filter_input(INPUT_GET,'id_tido'));

if ($c_documento->eliminar())
{
    echo '{ "resul":true}';
}
