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
    <title>Agregar Pago Venta | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Detalle de Pago Venta</h4>
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
                                <h4 class="card-title">Detalle dePago venta</h4>
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
                                <h4 class="card-title">Ver Pago de este Contrato</h4>
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
            <div class="modal-header">
                <h4 class="card-title">Agregar Pago Venta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body">
                    <form id="formulario_modal_pago" action="../" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 col-form-label">Proveedor</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="input_proveedor" id="input_proveedor" required>
                                <input type="hidden" name="hidden_id_proveedor" id="hidden_id_proveedor">
                            </div>
                            <div class="col-sm-2">
                                <a href="reg_proveedor.php" class="btn btn-info"><i class="fa fa-plus"></i> Crear</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Servicio</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="input_servicio" name="input_servicio" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fecha</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="input_fecha" name="input_fecha" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Monto a Pagar</label>
                            <div class="col-sm-3">
                                <input type="text" placeholder="0.00" class="form-control text-right" id="input_monto" name="input_monto" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tipo de Pago</label>
                            <div class="col-sm-5">
                                <label class="col-sm-3.4 col-form-label">Cuota</label>
                                <input type="radio">
                                <label  class="col-sm-3.4 col-form-label">Contado</label>
                                <input type="radio">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Cuotas</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="select_cuota" id="select_cuota">
                                    <option value="0">Seleccionar</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                    <option value="4">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total de Cuotas</label>
                            <div class="col-sm-3">
                                <input type="text" placeholder="0.00" class="form-control text-right" id="input_monto" name="input_monto" required/>
                            </div>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-success mr-2">Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
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