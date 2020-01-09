<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 05/05/2019
 * Time: 01:33 AM
 */

require '../clases/cl_monitoreo_comentarios.php';
$c_comentario = new cl_monitoreo_comentarios();

$c_comentario->setIdMonitoreo(filter_input(INPUT_POST, 'hidden_id_monitoreo'));
$c_comentario->setFecha(date("Y-m-d"));
$c_comentario->setAutor(filter_input(INPUT_POST, 'input_autor'));
$c_comentario->setTitulo(filter_input(INPUT_POST, 'input_titulo'));
$c_comentario->setMensaje(filter_input(INPUT_POST, 'input_mensaje'));
$c_comentario->setTipo(1);
$c_comentario->setAccion(filter_input(INPUT_POST, 'radio_tipo'));
$c_comentario->obtener_id();

if ($c_comentario->insertar()) {
    header("Location: ../ver_monitoreo_detalle.php?id_monitoreo=" . $c_comentario->getIdMonitoreo());
}