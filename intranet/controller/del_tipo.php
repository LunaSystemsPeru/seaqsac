<?php
require '../../models/TipoClasificacion.php';

$c_tipo = new TipoClasificacion();

$c_tipo->setId(filter_input(INPUT_GET, 'id_tipo'));

if ($c_tipo->eliminar()){
    echo '{ "resul":true}';
}