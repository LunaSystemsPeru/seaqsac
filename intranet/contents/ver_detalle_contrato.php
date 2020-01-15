<?php

require '../../models/Proveedor.php';
require '../../models/Contrato.php';
require '../../models/Banco.php';
require '../../models/TipoClasificacion.php';


$c_banco = new Banco();
$tipoClasificacion = new TipoClasificacion();


$c_proveedor = new Proveedor();
$contrato = new Contrato();


$listaBancos = $c_banco->ver_filas();
$idcontrado = filter_input(INPUT_GET, 'contrato');
if (is_null($idcontrado)) {
    header("Location: ver_contrato.php");
}
$contrato->setIdContrato($idcontrado);

$contrato->obtener_datos();

$c_proveedor->setIdProveedor($contrato->getIdProveedor());
$c_proveedor->obtener_datos();
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
                                    <button data-toggle="modal" data-target="#modal_pago_frecuente"
                                            class="btn btn-behance"><i class="fa fa-edit"></i>Modificar Pago
                                    </button>
                                    <button onclick=""
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
                                <h4 class="card-title">Detalle del Contrato</h4>


                                <div class="form-group">
                                    <label for="">Codigo Contrato:</label>
                                    <label for=""><?php echo $contrato->getIdContrato() ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Proveedor:</label>
                                    <label for=""><?php echo $c_proveedor->getRazonSocial() ?></label>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="">Duracion:</label>
                                    <label for=""><?php echo $contrato->getDuracion() ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Servicio:</label>
                                    <label for=""><?php echo $contrato->getServicio() ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha Inicio:</label>
                                    <label for=""><?php echo $contrato->getFechaInicio() ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha de termino:</label>
                                    <label for=""><?php echo $contrato->getFechaFin() ?></label>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="">Total a Pagar:</label>
                                    <label for=""><?php echo number_format($contrato->getMontoPactado(), 2) ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Total Pagado:</label>
                                    <label for=""><?php echo number_format($contrato->getMontoPagado(), 2) ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Faltante:</label>
                                    <label for=""><?php echo number_format(($contrato->getMontoPactado() - $contrato->getMontoPagado()), 2) ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Estado:</label>
                                    <?php
                                    if ($contrato->getEstado() == 1) {
                                        echo "<label class='badge badge-success' >Activo</label>";
                                    } elseif ($contrato->getEstado() == 2) {
                                        echo "<label class='badge badge-danger' >Finalizado</label>";
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
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-bold">Ver Todos los Pagos</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Banco</th>
                                        <th>Monto</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div-->
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

<div class="modal fade" id="modal_pago_fre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-4">Agregar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_modal_pago" action="../controller/reg_frecuencia_movimiento.php" method="post">
                    <input type="hidden" name="id_pago" value="<?php echo $idPago ?>">
                    <div class="form-group">

                        <label for="banco" class="col-form-label">Banco:</label>
                        <select name="id_banco" class="form-control" id="banco">
                            <?php foreach ($listaBancos as $item) {

                                echo "<option value='{$item['id_banco']}'>{$item['nombre']}</option>";
                            } ?>

                        </select>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="enviarformularioRegistro()">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
            </div>
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

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>