<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 10/07/19
 * Time: 07:04 PM
 */

require '../clases/cl_monitoreo_anexo.php';
require '../clases/cl_monitoreo.php';

$c_anexo = new cl_monitoreo_anexo();
$c_monitoreo = new cl_monitoreo();

$c_anexo->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_anexo->setDescripcion(filter_input(INPUT_POST, 'input_descripcion'));
$c_anexo->setIdMonitoreo(filter_input(INPUT_POST, 'hidden_id_monitoreo_anexo'));
$c_anexo->obtener_id();

$c_monitoreo->setIdMonitoreo($c_anexo->getIdMonitoreo());
$c_monitoreo->obtener_datos();

if (!empty($_FILES["input_archivo"])) {
    $file = $_FILES["input_archivo"];
    $file_temporal = $file['tmp_name'];

    $temporary = explode(".", $file["name"]);
    $file_extension = end($temporary);
    if ($file["error"] > 0) {
        die("Return Code: " . $file["error"] . "<br/><br/>");
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
        $c_anexo->setArchivo("a-".$c_anexo->getIdMonitoreo() . "-" . $c_anexo->getIdAnexo() . '.' . $file_extension);

        if (move_uploaded_file($file_temporal, $dir_subida . $c_anexo->getArchivo())) {
            //print "El archivo fue subido con éxito.";

            if ($c_anexo->insertar()) {
                header("Location: ../ver_monitoreo_detalle.php?id_monitoreo=" . $c_anexo->getIdMonitoreo());
            }
        } else {
            print "Error al intentar subir el archivo.";
        }
    }
} else {
    print "no hay archivo seleccionado";
}
