<?php
require '../../models/TipoSubClase.php';

$c_tipo = new TipoSubClase();

$c_tipo->setIdClase(filter_input(INPUT_POST, 'id_subclase'));

if ($c_tipo->eliminar()){
    echo '{ "resul":true}';
}
