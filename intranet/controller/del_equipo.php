<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 06:09 PM
 */

require '../../models/Equipo.php';

$c_equipo = new Equipo();

$c_equipo->setIdEquipo(filter_input(INPUT_GET, 'id_equipo'));
if ($c_equipo->eliminar()) {
    header("Location: ../contents/ver_equipos.php");
}