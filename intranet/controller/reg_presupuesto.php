<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 11/07/19
 * Time: 11:22 AM
 */

require '../clases/Presupuesto.php';

$c_presupuesto = new Presupuesto();

$c_presupuesto->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_presupuesto->setAnio(date("Y"));
$c_presupuesto->setIdCliente(filter_input(INPUT_POST, 'select_cliente'));
$c_presupuesto->setDescripcion(filter_input(INPUT_POST, 'input_descripcion'));
$c_presupuesto->setTotal(filter_input(INPUT_POST, 'input_total'));
$c_presupuesto->obtener_id();

if (!empty($_FILES["input_archivo"])) {
    $file = $_FILES['input_archivo'];
    $file_temporal = $file['tmp_name'];

    $temporary = explode(".", $file["name"]);
    $file_extension = end($temporary);
    if ($file["error"] > 0) {
        die("Return Code: " . $file["error"] . "<br/><br/>");
    } else {

        //establecer directorio de subida
        $dir_subida = '../../archivos/cotizaciones/';
        //crear carpeta sino existe
        if (!file_exists($dir_subida)) {
            if (!mkdir($dir_subida, 0777, true)) {
                die('Fallo al crear las carpetas...');
            }
        }

        //establecer nombre de archivo
        $c_presupuesto->setArchivo($c_presupuesto->getIdCotizacion() . '.' . $file_extension);

        if (move_uploaded_file($file_temporal, $dir_subida . $c_presupuesto->getArchivo())) {
            //print "El archivo fue subido con éxito.";

            if ($c_presupuesto->insertar()) {
                header("Location: ../ver_presupuestos.php");
            }
        } else {
            print "Error al intentar subir el archivo.";
        }
    }
} else {
    print "no hay archivo seleccionado";
}
