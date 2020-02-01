<?php
require '../../models/UsuarioPermiso.php';

$permiso = new UsuarioPermiso();

$permiso->setIdUsuario(filter_input(INPUT_POST, 'id'));

$permiso->eliminar();

$array_permisos = $_POST['input_permiso'];

for ($x = 0; $x < count($array_permisos); $x++) {
    //echo "permiso " . $x . " = " .  $array_permisos[$x] . "<br>";
    $permiso->setIdPermiso($array_permisos[$x]);
    $permiso->insertar();
}

header("Location: ../contents/ver_usuarios.php");