<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 11:09 AM
 */

require '../clases/cl_orden_interna.php';

$c_orden = new cl_orden_interna();

$c_orden->setFecha(filter_input(INPUT_POST, 'input_faprobado'));
$c_orden->setMontoCotizacion(filter_input(INPUT_POST, 'input_monto'));
$c_orden->setMontoOrden(filter_input(INPUT_POST, 'input_maprobado'));
$c_orden->setDuracion(filter_input(INPUT_POST, 'input_duracion'));
$c_orden->setIdCotizacion(filter_input(INPUT_POST, 'hidden_id_cotizacion'));
$c_orden->obtener_id();

if ($c_orden->insertar()) {
    header("Location: ../ver_orden_interna.php");
}