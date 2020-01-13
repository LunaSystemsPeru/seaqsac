<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 04/07/19
 * Time: 05:17 PM
 */

require '../../models/Venta.php';

$c_venta = new Venta();

$c_venta->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_venta->setIdDocumento(filter_input(INPUT_POST, 'select_documento'));
$c_venta->setSerie(filter_input(INPUT_POST, 'input_serie'));
$c_venta->setNumero(filter_input(INPUT_POST, 'input_numero'));
$c_venta->setIdCliente(filter_input(INPUT_POST, 'select_cliente'));
$c_venta->setIdOrdenInterna(filter_input(INPUT_POST, 'select_orden_interna'));
$c_venta->setIdOrdenCliente(filter_input(INPUT_POST, 'select_orden_servicio'));
$c_venta->setPorcentaje(filter_input(INPUT_POST, 'input_porcentaje'));
$c_venta->setTotal(filter_input(INPUT_POST, 'hidden_total'));
$c_venta->setPeriodoVenta(filter_input(INPUT_POST, 'input_periodo'));
$c_venta->obtener_id();

if (!empty($_FILES["input_file"])) {
    $file = $_FILES['input_file'];
    $file_name = $file['name'];
    $file_temporal = $file['tmp_name'];

    $temporary = explode(".", $file_name);
    $file_extension = end($temporary);
    if ($file["error"] > 0) {
        die("Return Code: " . $file["error"] . "<br/><br/>");
    } else {

        //establecer directorio de subida
        $dir_subida = '../../archivos/ventas/';

        //establecer nombre de archivo
        $c_venta->setArchivo($c_venta->getPeriodoVenta() . $c_venta->getIdVenta() . '.' . $file_extension);

        if (move_uploaded_file($file_temporal, $dir_subida . $c_venta->getArchivo())) {
            //print "El archivo fue subido con éxito.";

            if ($c_venta->insertar()) {
                header("Location: ../contents/ver_ventas.php");
            }
        } else {
            print "Error al intentar subir el archivo.";
        }
    }
} else {
    print "no hay archivo seleccionado";
}

