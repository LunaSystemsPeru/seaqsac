<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 04/05/2019
 * Time: 08:43 AM
 */

require '../../models/Capacitacion.php';
$c_capacitacion = new Capacitacion();

$c_capacitacion->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_capacitacion->setIdSucursal(filter_input(INPUT_POST, 'select_sucursal'));
$c_capacitacion->setIdCliente(filter_input(INPUT_POST, 'select_cliente'));
$c_capacitacion->setIdUsuario(1);
$c_capacitacion->setTotHoras(filter_input(INPUT_POST, 'input_horas'));
$c_capacitacion->setIdTipo(filter_input(INPUT_POST, 'select_tipo'));
$c_capacitacion->setNombre(filter_input(INPUT_POST, 'input_descripcion'));
$c_capacitacion->setArchivoAsistencia(filter_input(INPUT_POST, 'input_archivo'));
$c_capacitacion->setNasistentes(0);
$c_capacitacion->obtener_id();

if ($c_capacitacion->insertar()) {
    header("Location: ../contents/ver_capacitaciones_empleados.php?id_capacitacion=". $c_capacitacion->getIdCapacitacion());
}