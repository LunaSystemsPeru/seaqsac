<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 03:40 PM
 */

require '../clases/cl_presupuesto.php';

$c_presupuesto = new cl_presupuesto();
$c_presupuesto->setIdCotizacion(filter_input(INPUT_GET, 'id_cotizacion'));

if ($c_presupuesto->eliminar()) {
    header("Location: ../ver_presupuestos.php");
}