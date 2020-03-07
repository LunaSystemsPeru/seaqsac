<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 03:40 PM
 */

require '../../models/Presupuesto.php';

$c_presupuesto = new Presupuesto();
$c_presupuesto->setIdCotizacion(filter_input(INPUT_GET, 'id_cotizacion'));

if ($c_presupuesto->eliminar()) {
    header("Location: ../contents/ver_presupuestos.php");
}