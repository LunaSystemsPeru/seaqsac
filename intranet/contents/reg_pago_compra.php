<?php
session_start();
require '../../models/TipoClasificacion.php';
$c_tipo = new TipoClasificacion();
$c_tipo->setCodigo(4);
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agregar Pago Compra | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                                <h4 class="h3">Detalle de Pago Compra</h4>
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
                                <h4 class="card-title">Detalle de Pago Compra</h4>
                                <div class="form-group">
                                    <label for="">Codigo Contrato:</label>
                                    <label for=""></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Proveedor:</label>
                                    <label for=""></label>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="">Servicio:</label>
                                    <label for=""></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha:</label>
                                    <label for=""></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Monto a Pagar:</label>
                                    <label for=""></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Tipo de pago:</label>
                                    <label for=""></label>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="">Total de Cuotas:</label>
                                    <label for=""></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Total a Pagar:</label>
                                    <label for=""></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Total Pagado:</label>
                                    <label for=""></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Faltante:</label>
                                    <label for=""></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Estado:</label>
                                        <label class='badge badge-success' >Activo</label>
                                        <label class='badge badge-danger' >Finalizado</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ver Pago de Compra</h4>
                                <div class="panel-body">
                                    <span data-toggle="modal" data-target="#modal_pago_fre" class="btn btn-behance"><i class="fa fa-plus"></i>Agregar</span>
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
            <form id="formulario_modal_pago" action="../controller/reg_contrato_pago.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Agregar Pago Compra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pago" value="">
                    <div class="form-group">

                        <label for="banco" class="col-form-label">Banco:</label>
                        <select name="id_banco" class="form-control" id="banco">
                            <option value='1'>2 </option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto total:</label>
                        <input type="text" name="monto_total" value="" class="form-control" id="monto_total" readonly>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto Pagado:</label>
                        <input type="text" name="monto_pagado" value="" class="form-control" id="monto_pagado" readonly>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto:</label>
                        <input required type="number" name="monto" class="form-control" id="monto">
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-form-label">Fecha:</label>
                        <input type="date" value="" name="fecha" class="form-control"
                               id="fecha">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_contrato" value="">
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../../vendors/assets/js/off-canvas.js"></script>
<script src="../../vendors/assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../vendors/assets/js/dashboard.js"></script>

<script src="../../vendors/assets/js/funciones_autocomplete.js"></script>
<!-- End custom js for this page-->

</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>