<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 03:35 PM
 */

require '../clases/cl_orden_interna.php';

$c_orden = new cl_orden_interna();

$c_orden->setIdOrden(filter_input(INPUT_GET, 'id_orden_interna'));

if ($c_orden->eliminar()) {
    header("Location: ../ver_presupuestos.php");
}