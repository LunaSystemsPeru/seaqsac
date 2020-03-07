<?php

$id_plan = filter_input(INPUT_POST, 'id_plan');
$nombre_archivo = filter_input(INPUT_POST, 'archivo');

unlink("../../../archivos/clientes/pgrs/" . $id_plan . "/" . $nombre_archivo);

//header("Location: ../ver_archivos_plan_residuos.php?id_plan=" . $id_plan);