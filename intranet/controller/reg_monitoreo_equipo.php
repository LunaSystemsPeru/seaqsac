<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 11/07/19
 * Time: 10:31 AM
 */

require '../clases/cl_monitoreo_equipo.php';

$c_equipos = new cl_monitoreo_equipo();

$c_equipos->setIdMonitoreo(filter_input(INPUT_POST, 'hidden_id_monitoreo_equipo'));
$c_equipos->setIdEquipo(filter_input(INPUT_POST, 'select_equipo'));

if ($c_equipos->insertar()) {
    header("Location: ../ver_monitoreo_detalle.php?id_monitoreo=" . $c_equipos->getIdMonitoreo());
}