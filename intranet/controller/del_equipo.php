<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 06:09 PM
 */

require '../clases/cl_equipo.php';

$c_equipo = new cl_equipo();

$c_equipo->setIdEquipo(filter_input(INPUT_GET, 'id_equipo'));
if ($c_equipo->eliminar()) {
    header("Location: ../ver_equipos.php");
}