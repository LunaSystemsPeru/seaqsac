<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 05:09 PM
 */

require '../clases/cl_monitoreo_equipo.php';

$c_equipo = new cl_monitoreo_equipo();
$c_equipo->setIdMonitoreo(filter_input(INPUT_GET, 'id_monitoreo'));
$c_equipo->setIdEquipo(filter_input(INPUT_GET, 'id_equipo'));

if ($c_equipo->eliminar()) {
    header("Location: ../ver_monitoreo_detalle.php?id_monitoreo=" . $c_equipo->getIdMonitoreo());
}