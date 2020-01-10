<!DOCTYPE html>
<html lang="es">


    <!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Agregar Equipo de Medicion | SEAQ SAC - Software de Gestion </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../../vendors/assets/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../../vendors/assets/images/favicon.png" />
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
                                    <form class="form-sample" enctype="multipart/form-data" method="post" action="../controller/reg_equipo.php">
                                        <div class="card-header">
                                            <h4 class="h3">Agregar Equipo de Medicion</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nombre" name="input_nombre" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Marca</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="input_marca" name="input_marca" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Modelo</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="input_modelo" name="input_modelo" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Serie</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="input_serie" name="input_serie" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Costo Equipo</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="input_costo" name="input_costo" required/>
                                                </div>
                                                <label class="col-sm-2 col-form-label">Costo Alquiler</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="input_alquiler" name="input_alquiler" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Periodo Calibracion</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="select_periodo" id="select_periodo">
                                                        <option value="1">6 meses</option>
                                                        <option value="1">1 año</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Fecha Calibracion</label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" id="input_calibracion" name="input_calibracion" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Certificado</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" id="input_certificado" name="input_certificado" accept="application/pdf"/>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success mr-2">Guardar</button>
                                        </div>
                                    </form>
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
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="../../vendors/assets/js/off-canvas.js"></script>
        <script src="../../vendors/assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="../../vendors/assets/js/dashboard.js"></script>
        <script src="../../vendors/assets/js/funciones_basicas.js"></script>
        <!-- End custom js for this page-->

        <script>

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