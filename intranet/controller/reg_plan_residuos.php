<?php
require '../../models/PlanResiduos.php';
$planResiduo=new PlanResiduos();

$planResiduo->obtener_id();
$planResiduo->setIdCliente(filter_input(INPUT_POST, 'selectCliente'));
$planResiduo->setAnio(filter_input(INPUT_POST, 'input_anio'));
$planResiduo->setIdSucursal(filter_input(INPUT_POST, 'select_sucursal'));

if ($planResiduo->insertar()){
    header("Location: ../contents/ver_archivos_plan_residuos.php?plan=".$planResiduo->getIdPlan());
}
