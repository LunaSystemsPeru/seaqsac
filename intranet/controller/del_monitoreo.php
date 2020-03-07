<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 05:07 PM
 */

require '../../models/Monitoreo.php';

$c_monitoreo = new Monitoreo();
$c_monitoreo->setIdMonitoreo(filter_input(INPUT_GET, 'id_monitoreo'));
if ($c_monitoreo->eliminar()) {
    header("Location: ../contents/ver_informe_monitoreos.php");
}