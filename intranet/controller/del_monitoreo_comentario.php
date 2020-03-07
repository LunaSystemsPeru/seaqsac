<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 06:46 PM
 */

require '../../models/MonitoreoComentario.php';

$c_comentario = new MonitoreoComentario();
$c_comentario->setIdMonitoreo(filter_input(INPUT_GET, 'id_monitoreo'));
$c_comentario->setIdComentario(filter_input(INPUT_GET, 'id_comentario'));

if ($c_comentario->eliminar()) {
    header("Location: ../contents/ver_monitoreo_detalle.php?id_monitoreo=" . $c_comentario->getIdMonitoreo());
}