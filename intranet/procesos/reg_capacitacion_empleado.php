<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 04/05/2019
 * Time: 10:06 AM
 */

require '../clases/cl_capacitacion_asistente.php';
$c_asistente = new cl_capacitacion_asistente();

$c_asistente->setIdCapacitacion(filter_input(INPUT_POST, 'hidden_id_capacitacion'));
$c_asistente->setDni(filter_input(INPUT_POST, 'input_dni'));
$c_asistente->setDatos(filter_input(INPUT_POST, 'input_datos'));
$c_asistente->obtener_id();


if ($c_asistente->insertar()) {
    header("Location: ../ver_capacitaciones_empleados.php?id_capacitacion=". $c_asistente->getIdCapacitacion());
}