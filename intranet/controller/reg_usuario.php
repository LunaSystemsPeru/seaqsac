<?php

require '../../models/Usuario.php';

$usuario = new Usuario();

$usuario->setIdEmpresa(1);
$usuario->setNombre(filter_input(INPUT_POST, 'input_datos'));
$usuario->setEmail(filter_input(INPUT_POST, 'input_email'));
$usuario->setCelular(filter_input(INPUT_POST, 'input_celular'));
$usuario->setContrasena(filter_input(INPUT_POST, 'input_pass'));
$usuario->setUsername(filter_input(INPUT_POST, 'input_usuario'));
$usuario->obtener_id();

if (!empty($_FILES["file"])) {
    $file = $_FILES['file']['name'];
    $file_temporal = $_FILES['file']['tmp_name'];

    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ($_FILES["file"]["error"] > 0) {
        die("Return Code: " . $_FILES["file"]["error"] . "<br/><br/>");
    } else {

        //establecer directorio de subida
        $dir_subida = '../../archivos/empleados/perfil/';

        //establecer nombre de archivo
        $usuario->setFoto($usuario->getIdUsuario() . "." . $file_extension);

        if (move_uploaded_file($file_temporal, $dir_subida . $usuario->getFoto())) {
            //print "El archivo fue subido con éxito.";
            $usuario->insertar();
            header("Location: ../contents/ver_usuarios.php");
        } else {
            print "Error al intentar subir el archivo.";
        }
    }
} else {
    print "no hay archivo seleccionado";
}

