<?php

/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 05/05/2019
 * Time: 03:47 AM
 */
session_start();

require '../../models/Usuario.php';
require '../../models/Empresa.php';

$c_usuario = new Usuario();
$c_empresa = new Empresa();

$c_usuario->setUsername(filter_input(INPUT_POST, 'input_usuario'));
$contrasena = filter_input(INPUT_POST, 'input_password');

$siusuario = $c_usuario->validar_username();

if ($siusuario) {
    $c_usuario->obtener_datos();
    if ($contrasena == $c_usuario->getContrasena()) {
        $c_usuario->obtener_datos();
        $_SESSION['id_usuario'] = $c_usuario->getIdUsuario();
        $_SESSION['id_empresa'] = $c_empresa->getIdEmpresa();
    } else {
        echo "contrasena incorrecta ";
        $id_error = 2;
    }
} else {
    $id_error = 1;
}

if ($id_error > 0) {
    header("Location: ../login.php?error=" . $id_error);
}
//echo $id_error;

if ($id_error == 0 & ($siusuario)) {
    //echo "si_cliente = " . $sicliente;
      header("Location: ../contents/index.php");
}
