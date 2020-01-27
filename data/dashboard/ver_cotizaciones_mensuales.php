<?php
require '../../models/Presupuesto.php';

$cotizacion = new Presupuesto();

$tipo = filter_input(INPUT_GET, 'tipo_reporte');

if ($tipo == 1) {
    echo $cotizacion->verCotizacionesMensualesxCantidad();
}

if ($tipo == 2) {
    echo $cotizacion->verCotizacionesMensualesxCosto();
}