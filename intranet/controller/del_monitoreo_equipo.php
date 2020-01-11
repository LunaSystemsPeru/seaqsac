<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 05:09 PM
 */

require '../../models/MonitoreoEquipo.php';

$c_equipo = new MonitoreoEquipo();
$c_equipo->setIdMonitoreo(filter_input(INPUT_GET, 'id_monitoreo'));
$c_equipo->setIdEquipo(filter_input(INPUT_GET, 'id_equipo'));

if ($c_equipo->eliminar()) {
    header("Location: ../contents/ver_monitoreo_detalle.php?id_monitoreo=" . $c_equipo->getIdMonitoreo());
}