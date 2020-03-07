<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../../models/Equipo.php';

$c_equipo = new Equipo();

$c_equipo->setIdEquipo(filter_input(INPUT_POST, 'hidden_id_producto'));
$c_equipo->obtener_datos();

$c_equipo->setNombre(filter_input(INPUT_POST, 'input_nombre'));
$c_equipo->setMarca(filter_input(INPUT_POST, 'input_marca'));
$c_equipo->setModelo(filter_input(INPUT_POST, 'input_modelo'));
$c_equipo->setSerie(filter_input(INPUT_POST, 'input_serie'));
$c_equipo->setCosto(filter_input(INPUT_POST, 'input_costo'));
$c_equipo->setAlquiler(filter_input(INPUT_POST, 'input_alquiler'));
$c_equipo->setUltimaCalibracion(filter_input(INPUT_POST, 'input_calibracion'));
$c_equipo->setPeriodo(filter_input(INPUT_POST, 'select_periodo'));


if ($_FILES['input_certificado']['name'] != "")
{

    $file = $_FILES["input_certificado"];
    $file_temporal = $file['tmp_name'];

    $temporary = explode(".", $file["name"]);
    $file_extension = end($temporary);

    //establecer directorio de subida
    $dir_subida = '../../archivos/equipos/';

    //crear carpeta sino existe
    if (!file_exists($dir_subida)) {
        if (!mkdir($dir_subida, 0777, true)) {
            die('Fallo al crear las carpetas...');
        }
    }

    if (file_exists(__DIR__ . $dir_subida . $c_equipo->getArchivo())){
        unlink(__DIR__."/" .$dir_subida . $c_equipo->getArchivo());
    }



    //establecer nombre de archivo
    $c_equipo->setArchivo($c_equipo->getIdEquipo() . '.' . $file_extension);

    if (move_uploaded_file($file_temporal, $dir_subida . $c_equipo->getArchivo())) {
        //print "El archivo fue subido con éxito.";


    } else {
        print "Error al intentar subir el archivo.";
    }

}

if ($c_equipo->actualizar()) {
    header("Location: ../contents/ver_equipos.php");
}


