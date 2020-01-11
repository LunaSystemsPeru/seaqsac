<?php

require '../../models/Monitoreo.php';

$c_monitoreo = new Monitoreo();

$c_monitoreo->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_monitoreo->setIdCliente(filter_input(INPUT_POST, 'select_cliente'));
$c_monitoreo->setIdSucursal(filter_input(INPUT_POST, 'select_sucursal'));
$c_monitoreo->setIdTipo(filter_input(INPUT_POST, 'select_tipo'));
$c_monitoreo->setIdClase(filter_input(INPUT_POST, 'select_clase'));
//$c_monitoreo->setUrlInforme(filter_input(INPUT_POST, 'input_url'));
$c_monitoreo->setIdUsuario(1);
$c_monitoreo->obtener_id();

if (!empty($_FILES["input_url"])) {
    $file = $_FILES['input_url']['name'];
    $file_temporal = $_FILES['input_url']['tmp_name'];

    $validextensions = array("pdf", "PDF");
    $temporary = explode(".", $_FILES["input_url"]["name"]);
    $file_extension = end($temporary);
    if ($_FILES["input_url"]["error"] > 0) {
        die("Return Code: " . $_FILES["input_url"]["error"] . "<br/><br/>");
    } else {

        //establecer directorio de subida
        $dir_subida = '../../archivos/clientes/monitoreos/' . $c_monitoreo->getIdCliente() . "/" . $c_monitoreo->getIdSucursal() . "/";
        //crear carpeta sino existe
        if (!file_exists($dir_subida)) {
            if (!mkdir($dir_subida, 0777, true)) {
                die('Fallo al crear las carpetas...');
            }
        }

        //establecer nombre de archivo
        $c_monitoreo->setUrlInforme($c_monitoreo->getIdMonitoreo() . '.' . $file_extension);

        if (move_uploaded_file($file_temporal, $dir_subida . $c_monitoreo->getUrlInforme())) {
            //print "El archivo fue subido con éxito.";

            if ($c_monitoreo->insertar()) {
                header("Location: ../contents/ver_informe_monitoreos.php");
            }
        } else {
            print "Error al intentar subir el archivo.";
        }
    }
} else {
    print "no hay archivo seleccionado";
}