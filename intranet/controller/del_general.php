<?php
require '../../models/TipoGeneral.php';

$c_tipo = new TipoGeneral();

$c_tipo->setId(filter_input(INPUT_GET, 'id_tipo'));


if ($c_tipo->eliminar()){
    echo '{ "resul":true}';
}

