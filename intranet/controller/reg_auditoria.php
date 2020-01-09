<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 05/05/2019
 * Time: 02:09 AM
 */

require '../clases/cl_auditoria.php';

$c_auditoria = new cl_auditoria();

$c_auditoria->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_auditoria->setAuditor(filter_input(INPUT_POST, 'input_auditor'));
$c_auditoria->setAuditado(filter_input(INPUT_POST, 'input_auditado'));
$c_auditoria->setAlcance(filter_input(INPUT_POST, 'input_alcance'));
$c_auditoria->setIdCliente(filter_input(INPUT_POST, 'select_cliente'));
$c_auditoria->setIdSucursal(filter_input(INPUT_POST, 'select_sucursal'));
$c_auditoria->setIdTipo(filter_input(INPUT_POST, 'select_tipo'));
$c_auditoria->setUrlInforme(filter_input(INPUT_POST, 'input_url'));
$c_auditoria->obtener_id();

if ($c_auditoria->insertar()) {
    header("Location: ../ver_informe_auditorias.php");
}
