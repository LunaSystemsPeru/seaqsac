<?php

require '../../models/Usuario.php';

$usuario = new Usuario();

$usuario->setIdUsuario(filter_input(INPUT_GET, 'id'));
$usuario->eliminar();

header("Location: ../contents/ver_usuarios.php");
