<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 05:07 PM
 */

require '../clases/Monitoreo.php';

$c_monitoreo = new Monitoreo();
$c_monitoreo->setIdMonitoreo(filter_input(INPUT_GET, 'id_monitoreo'));
if ($c_monitoreo->eliminar()) {
    header("Location: ../ver_informe_monitoreos.php");
}