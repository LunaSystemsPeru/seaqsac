<?php
require 'init_page.php';

require '../../models/Proveedor.php';
require '../../models/Contrato.php';
require '../../models/ContratoPago.php';
require '../../models/Banco.php';
require '../../models/TipoClasificacion.php';
require '../../tools/cl_varios.php';


$c_banco = new Banco();
$tipoClasificacion = new TipoClasificacion();
$c_proveedor = new Proveedor();
$contrato = new Contrato();
$c_varios = new cl_varios();
$c_pagos = new ContratoPago();


$listaBancos = $c_banco->ver_filas();

$idcontrado = filter_input(INPUT_GET, 'contrato');
if (is_null($idcontrado)) {
    header("Location: ver_contrato.php");
}
$contrato->setIdContrato($idcontrado);

$contrato->obtener_datos();

$c_proveedor->setIdProveedor($contrato->getIdProveedor());
$c_proveedor->obtener_datos();

$c_pagos->setIdContrato($contrato->getIdContrato());

$listaClasificacion=$tipoClasificacion->ver_tipos();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contratos | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.min.css"/>
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../vendors/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../vendors/assets/images/favicon.png"/>
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include '../fixed/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include '../fixed/sidebar.php' ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">Detalle del contrato</h4>
                                <div class="">
                                    <a href="ver_contrato.php"
                                       class="btn btn-info"><i class="fa fa-arrow-left"></i>ver Contratos
                                    </a>
                                    <button data-toggle="modal" data-target="#modal_edit_contrato"
                                            class="btn btn-behance"><i class="fa fa-edit"></i>Modificar Pago
                                    </button>
                                    <button onclick="eliminarContrato(<?php echo $contrato->getIdContrato() ?>)"
                                            class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6 grid-margin stretch-card">

                        <div class="card">


                            <div class="card-body">
                                <h4 class="card-title">Datos del Contrato</h4>


                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Codigo Contrato:</label>
                                    <label for=""><?php echo $contrato->getIdContrato() ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Proveedor:</label>
                                    <label for=""><?php echo $c_proveedor->getRazonSocial() ?></label>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Duracion:</label>
                                    <label for=""><?php echo $contrato->getDuracion() ?> dias</label>
                                </div>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Servicio:</label>
                                    <label for=""><?php echo $contrato->getServicio() ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Fecha Inicio:</label>
                                    <label for=""><?php echo $c_varios->fecha_mysql_web($contrato->getFechaInicio()) ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Fecha de termino:</label>
                                    <label for=""><?php echo $c_varios->fecha_mysql_web($contrato->getFechaFin()) ?></label>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Total a Pagar:</label>
                                    <label for=""><?php echo number_format($contrato->getMontoPactado(), 2) ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Total Pagado:</label>
                                    <label for=""><?php echo number_format($contrato->getMontoPagado(), 2) ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Faltante:</label>
                                    <label for=""><?php echo number_format(($contrato->getMontoPactado() - $contrato->getMontoPagado()), 2) ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Estado:</label>
                                    <?php
                                    if ($contrato->getEstado() == 1) {
                                        echo "<label class='badge badge-success badge-lg' >Activo</label>";
                                    } elseif ($contrato->getEstado() == 2) {
                                        echo "<label class='badge badge-danger badge-lg' >Finalizado</label>";
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ver Pago de este Contrato</h4>
                                <div class="panel-body">
                                    <?php if ($contrato->getMontoPagado() < $contrato->getMontoPactado() && $contrato->getEstado() == 1) {
                                        echo '<span data-toggle="modal" data-target="#modal_pago_fre" class="btn btn-behance"><i class="fa fa-plus"></i>Agregar</span>';
                                    } ?>

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Banco</th>
                                            <th>Monto</th>
                                            <th>Deuda</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $saldo = $contrato->getMontoPactado();
                                        foreach ($c_pagos->verFilas() as $fila) {
                                            $saldo -= $fila['sale'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $c_varios->fecha_mysql_web($fila['fecha'])?></td>
                                                <td><?php echo $fila['nombre']?></td>
                                                <td class="text-right"><?php echo number_format($fila['sale'],2)?></td>
                                                <td class="text-right"><?php echo number_format($saldo,2)?></td>
                                                <td class="text-center">
                                                    <button onclick="eliminar(<?php echo $fila['id_movimiento'] . ','.$idcontrado?>)" class="btn btn-icons btn-danger" title="Eliminar Pago"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php include '../fixed/footer.php' ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<div class="modal fade" id="modal_edit_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formulario_modal_pago"  class="form-horizontal" action="../controller/udt_contrato.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Contrato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputFechaI" class="control-label">Fecha de Inicio</label>
                        <div class="col-sm-10">
                            <input type="date" name="fecha_inicio" value="<?php echo date("Y-m-d",strtotime($contrato->getFechaInicio()));?>" class="form-control" id="inputFechaI" >
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="inputDur" class="control-label">Duracion</label>
                        <div class="col-sm-10">
                            <input type="text" name="duracion" value="<?php echo $contrato->getDuracion() ?>"  class="form-control" id="inputDur" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSer" class="control-label">Servicio</label>
                        <div class="col-sm-10">
                            <input type="text" name="servicio"  value="<?php echo $contrato->getServicio() ?>"  class="form-control" id="inputSer" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTot" class="control-label">Total</label>
                        <div class="col-sm-10">
                            <input type="text"  name="total_pactado" value="<?php echo $contrato->getMontoPactado() ?>" class="form-control" id="inputTot" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Tipo</label>
                        <div class="col-sm-10">
                            <select name="id_tipo" class="form-control">

                                <?php foreach ($listaClasificacion as $item){
                                    if ($item["id_tipo"]==$contrato->getIdClasificacion()){
                                        echo "<option value='{$item['id_tipo']}' selected>{$item['nombre']}</option>";
                                    }else{
                                        echo "<option value='{$item['id_tipo']}'>{$item['nombre']}</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_contrato" value="<?php echo $contrato->getIdContrato() ?>">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_pago_fre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formulario_modal_pago" action="../controller/reg_contrato_pago.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Agregar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pago" value="<?php echo $idcontrado ?>">
                    <div class="form-group">

                        <label for="banco" class="col-form-label">Banco:</label>
                        <select name="id_banco" class="form-control" id="banco">
                            <?php foreach ($listaBancos as $item) {

                                echo "<option value='{$item['id_banco']}'>" . $item['nombre'] . " - S/ " . $item['monto'] . "</option>";
                            } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto total:</label>
                        <input type="text" name="monto_total" value="<?php echo number_format($contrato->getMontoPactado(), 2) ?>" class="form-control" id="monto_total" readonly>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto Pagado:</label>
                        <input type="text" name="monto_pagado" value="<?php echo number_format($contrato->getMontoPagado(), 2) ?>" class="form-control" id="monto_pagado" readonly>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto:</label>
                        <input required type="number" name="monto" class="form-control" id="monto">
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-form-label">Fecha:</label>
                        <input type="date" value="<?php echo date("Y-m-d"); ?>" name="fecha" class="form-control"
                               id="fecha">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_contrato" value="<?php echo $contrato->getIdContrato() ?>">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- plugins:js -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<script src="../../vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../../vendors/assets/js/off-canvas.js"></script>
<script src="../../vendors/assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../vendors/assets/js/dashboard.js"></script>
<!-- End custom js for this page-->

<script>

    function enviarformularioRegistro() {
        if (isnumero($("#monto").val())) {
            $("#formulario_modal_pago").submit();
        } else {
            alert("Monto no valido");
        }
    }

    function isnumero(numero) {
        return !isNaN(parseInt(numero));
    }

    $(function () {

        // Initialize Example 1
        $('#tabla').dataTable({
            responsive: true
        });

    });

    function eliminarContrato(idC) {
        $.ajax({
            type: "GET",
            url: "../controller/del_contrato.php?idC="+idC,
            success: function (data) {
                console.log(data);
                if (IsJsonString(data)){
                    location.reload();
                } else{
                    alert("No de pudo eliminar el contrato");
                }
            }
        });
    }

    function eliminar(idM,idC) {
        $.ajax({
            type: "GET",
            url: "../controller/del_contrato_pago.php?idC="+idC+"&idM="+idM,
            success: function (data) {
                console.log(data);
                if (IsJsonString(data)){
                    location.reload();
                } else{
                    alert("No de pudo eliminar este cobro");
                }
            }
        });
    }

    function IsJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>