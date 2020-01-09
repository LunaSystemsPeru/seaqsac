<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 13/07/19
 * Time: 12:37 PM
 */

require '../clases/cl_documentos_sunat.php';
$c_documento = new cl_documentos_sunat();

$c_documento->setNombre(filter_input(INPUT_POST, 'input_descripcion'));
$c_documento->setAbreviado(filter_input(INPUT_POST, 'input_ncorto'));
$c_documento->setCodSunat(filter_input(INPUT_POST, 'input_codsunat'));
$c_documento->obtener_id();

if ($c_documento->insertar()) {
    header("Location: ../ver_documentos_sunat.php");
}