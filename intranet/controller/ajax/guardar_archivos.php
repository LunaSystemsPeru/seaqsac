<?php

$plan = filter_input(INPUT_GET, 'id_plan');

if (!empty($_FILES["file"])) {
    $file = $_FILES['file']['name'];
    ECHO $file;
    $file_temporal = $_FILES['file']['tmp_name'];

    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ($_FILES["file"]["error"] > 0) {
        die("Return Code: " . $_FILES["file"]["error"] . "<br/><br/>");
    } else {

        //establecer directorio de subida
        $dir_subida = '../../../archivos/clientes/pgrs/'.$plan.'/';

        if (!file_exists($dir_subida)) {
            if (!mkdir($dir_subida, 0777, true)) {
                echo "error al crear carpeta";
            }
        } else {
            echo "carpeta existe";
        }

        //establecer nombre de archivo
        if (move_uploaded_file($file_temporal, $dir_subida . $file)) {
//ok
        } else {
            print "Error al intentar subir el archivo.";
        }
    }
} else {
    print "no hay archivo seleccionado";
}