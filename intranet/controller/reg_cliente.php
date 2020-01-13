<?php

require '../../models/Cliente.php';
require '../../tools/cl_varios.php';

$c_cliente = new Cliente();
$c_varios = new cl_varios();

$c_cliente->setRuc(filter_input(INPUT_POST, 'input_ruc'));
$c_cliente->setRazonSocial(filter_input(INPUT_POST, 'input_razon_social'));
$c_cliente->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_cliente->setContacto(filter_input(INPUT_POST, 'input_contacto'));
$c_cliente->setCargo(filter_input(INPUT_POST, 'input_cargo'));
$c_cliente->setEmail(filter_input(INPUT_POST, 'input_correo'));
$c_cliente->setCelular(filter_input(INPUT_POST, 'input_telefono'));
$c_cliente->setTipo(filter_input(INPUT_POST, 'radio_tipo'));
$c_cliente->setIdEmpresa(filter_input(INPUT_POST, 'select_empresa'));
$c_cliente->obtener_id();

if ($c_cliente->getTipo() == 1) {
    $c_cliente->setContrasena($c_varios->generarCodigo(8));
}

if (!empty($_FILES["file"])) {
    $file = $_FILES['file']['name'];
    $file_temporal = $_FILES['file']['tmp_name'];

    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ($_FILES["file"]["error"] > 0) {
        die("Return Code: " . $_FILES["file"]["error"] . "<br/><br/>");
    } else {

        //establecer directorio de subida
        $dir_subida = '../../archivos/clientes/logos/';

        //establecer nombre de archivo
        $c_cliente->setLogo($c_cliente->getIdCliente() . '.' . $file_extension);

        if (move_uploaded_file($file_temporal, $dir_subida . $c_cliente->getLogo())) {
            //print "El archivo fue subido con éxito.";

            if ($c_cliente->insertar()) {
               header("Location: ../contents/ver_clientes.php");
            }
        } else {
            print "Error al intentar subir el archivo.";
        }
    }
} else {
    print "no hay archivo seleccionado";
}