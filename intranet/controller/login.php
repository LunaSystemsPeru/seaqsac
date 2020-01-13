<?php

/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 05/05/2019
 * Time: 03:47 AM
 */
session_start();

require '../../models/Cliente.php';
$c_cliente = new Cliente();

require '../../models/Empresa.php';
$c_empresa = new Empresa();

$c_cliente->setRuc(filter_input(INPUT_POST, 'input_ruc'));
$contrasena = filter_input(INPUT_POST, 'input_password');

$c_empresa->setRuc($c_cliente->getRuc());
$sicliente = $c_cliente->validar_ruc();
$id_error = 0;

if ($sicliente) {
    $c_cliente->obtener_datos();
    if ($contrasena == $c_cliente->getContrasena()) {
        $c_cliente->obtener_datos();
        $_SESSION['id_cliente'] = $c_cliente->getIdCliente();
        $_SESSION['tipo'] = 1;
        $_SESSION['nombre'] = $c_cliente->getRazonSocial();
        $_SESSION['contacto'] = $c_cliente->getContacto();
        $_SESSION['email'] = $c_cliente->getEmail();
        $_SESSION['url_logo'] = $c_cliente->getLogo();
    } else {
        echo "contrasena incorrecta ";
        $id_error = 2;
    }
} else {
    $id_error = 1;
}

$siempresa = $c_empresa->validar_ruc();

if ($siempresa) {
    //es cliente q da trabajos tiene clientes a su poder
    $c_empresa->obtener_datos();
    $_SESSION['id_empresa'] = $c_empresa->getIdEmpresa();
    $_SESSION['tipo'] = 2;
    $_SESSION['nombre'] = $c_empresa->getRazonSocial();
}


if ($id_error > 0) {
    header("Location: ../login.php?error=" . $id_error);
}
//echo $id_error;

if ($id_error == 0 & ($sicliente || $siempresa)) {
    //echo "si_cliente = " . $sicliente;
    //echo "si_empresa = " . $siempresa;
      header("Location: ../contents/index.php");
}
