<?php

?>
<!DOCTYPE html>
<html lang="es">


    <!-- mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by httrack website copier/3.x [xr&co'2014], mon, 29 apr 2019 14:35:52 gmt -->
    <head>
        <!-- required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Cobranza de Documentos de Venta | seaq sac - software de gestion </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.min.css"/>
        <!-- plugin css for this page -->
        <!-- end plugin css for this page -->
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
                            <div class="col-lg-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="h3">Documento de Venta</h4>
                                    </div>
                                    <div class="card-body">
                                        <p><span class="font-weight-bold">cliente =</span> CONMETAL Y SERVICIOS EIRL</p>
                                        <p><span class="font-weight-bold">fecha =</span> 2019-07-09</p>
                                        <p><span class="font-weight-bold">Orden Interna =</span> 2019-001</p>
                                        <p><span class="font-weight-bold">Orden de Servicio =</span> -</p>
                                        <p><span class="font-weight-bold">Total =</span> S/ 1,352.00</p>
                                        <p><span class="font-weight-bold">Pagado =</span> 0.00</p>
                                        <p><span class="font-weight-bold">Archivo </span> <a href="../../archivos/ventas/2019072.pdf" download="nombre_archivo.pdf" title="nombre_archivo"><i class="fa fa-download"></i> Descargar</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="h3">Pagos del Documento </span>Ft - e001 - 21</h4>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#modalcrear"><i class="fa fa-user-plus"></i>agregar pago</button>
                                        <a href="ver_informe_monitoreos.php" class="btn btn-outline-success">
                                            <i class="fa fa-arrow-left"></i>Regresar a Ventas
                                        </a>

                                        <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="forms-sample" method="post" action="../controller/reg_monitoreo_comentario.php">
                                                        <div class="color-line"></div>
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title">Agregar Pago de Documento</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Banco</label>
                                                                <div class="input-group col-xs-12">
                                                                    <select class="form-control" name="select_banco" id="select_banco">
                                                                        <option value="1">BANCO DE CREDITO - SOLES</option>
                                                                        <option value="1">BANCO DE LA NACION - SOLES</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Fecha: </label>
                                                                <input type="date" class="form-control" name="input_fecha" id="input_fecha" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Monto Total: </label>
                                                                <input type="text" class="form-control" name="input_total" id="input_total" readonly>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label for="exampleInputName1">Porcentaje: </label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-radio">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="radio_porcentaje" id="radio_9" value="9" checked > 9 %
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-radio">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="radio_porcentaje" id="radio_91" value="81" > 91 %
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Monto a Cobrar: </label>
                                                                <input type="text" class="form-control" name="input_cobro" id="input_cobro" required>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="tabla" class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Banco</th>
                                                <th>Porcentaje</th>
                                                <th>Monto</th>
                                                <th width="13%" class="text-center">Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2019-07-09</td>
                                                    <td>BANCO DE LA NACION - DETRACCIONES</td>
                                                    <td class="text-right">9%</td>
                                                    <td class="text-right"><?php echo number_format(120.00, 2) ?></td>
                                                    <td>
                                                        <button class="btn btn-danger btn-icons"><i class="fa fa-close"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

        <!-- plugins:js -->
        <script src="../../vendors/js/vendor.bundle.base.js"></script>
        <script src="../../vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- plugin js for this page-->
        <!-- end plugin js for this page-->
        <!-- inject:js -->
        <script src="../../vendors/assets/js/off-canvas.js"></script>
        <script src="../../vendors/assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- custom js for this page-->
        <script src="../../vendors/assets/js/dashboard.js"></script>
        <!-- end custom js for this page-->

        <script>

            $(function () {

                // initialize example 1
                $('#tabla').datatable({
                    responsive: true
                });

            });

        </script>
    </body>


    <!-- mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by httrack website copier/3.x [xr&co'2014], mon, 29 apr 2019 14:36:03 gmt -->
</html>
