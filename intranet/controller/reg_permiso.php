<?php

require '../../models/Permiso.php';

$permiso = new Permiso();

$permiso->setNombre(filter_input(INPUT_POST, 'input_descripcion'));
$permiso->obtener_id();

$permiso->insertar();

header("Location: ../contents/ver_permisos.php");
