<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 03:35 PM
 */

require '../../models/OrdenInterna.php';

$c_orden = new OrdenInterna();

$c_orden->setIdOrden(filter_input(INPUT_GET, 'id_orden_interna'));

if ($c_orden->eliminar()) {
    header("Location: ../contents/ver_presupuestos.php");
}