<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 05:41 PM
 */

require '../clases/cl_monitoreo_anexo.php';

$c_anexo = new cl_monitoreo_anexo();
$c_anexo->setIdMonitoreo(filter_input(INPUT_GET, 'id_monitoreo'));
$c_anexo->setIdAnexo(filter_input(INPUT_GET, 'id_anexo'));

if ($c_anexo->eliminar()) {
    header("Location: ../ver_monitoreo_detalle.php?id_monitoreo=" . $c_anexo->getIdMonitoreo());
}