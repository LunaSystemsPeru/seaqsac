<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 04/05/2019
 * Time: 07:38 AM
 */

require '../clases/TipoSubClase.php';

$c_clase = new TipoSubClase();

$c_clase->setIdTipo(filter_input(INPUT_POST, 'id_tipo'));
echo $c_clase->ver_clases_json();