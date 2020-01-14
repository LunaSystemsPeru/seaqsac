<?php
session_start();
require '../../models/OrdenServicio.php';

$c_orden = new OrdenServicio();
$c_orden->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_orden->setMonto(filter_input(INPUT_POST, 'input_total'));
$c_orden->setIdCliente(filter_input(INPUT_POST, 'select_cliente'));
$c_orden->setNumero(filter_input(INPUT_POST, 'input_numero'));
$c_orden->setDescripcion(filter_input(INPUT_POST, 'input_descripcion'));

$c_orden->obtener_id();

if (!empty($_FILES["input_archivo"])) {
    $file = $_FILES['input_archivo'];
    $file_temporal = $file['tmp_name'];

    $temporary = explode(".", $file["name"]);
    $file_extension = end($temporary);
    if ($file["error"] > 0) {
        die("Return Code: " . $file["error"] . "<br/><br/>");
    } else {

        //establecer directorio de subida
        $dir_subida = '../../archivos/orden_servicio/';
        //crear carpeta sino existe
        if (!file_exists($dir_subida)) {
            if (!mkdir($dir_subida, 0777, true)) {
                die('Fallo al crear las carpetas...');
            }
        }

        //establecer nombre de archivo
        $c_orden->setArchivo($c_orden->getIdOrden() . '.' . $file_extension);

        if (move_uploaded_file($file_temporal, $dir_subida . $c_orden->getArchivo())) {
            //print "El archivo fue subido con éxito.";

            if ($c_orden->insertar()) {
                header("Location: ../contents/ver_orden_servicio.php");
            }
        } else {
            print "Error al intentar subir el archivo.";
        }
    }
} else {
    print "no hay archivo seleccionado";
}

