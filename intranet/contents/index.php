<?php
include 'cabeza.php';
?>
<!DOCTYPE html>
<html lang="es">


    <!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SEAQ SAC - Software de Gestion </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
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
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-cube text-danger icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Ventas este Mes</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">28,265.00</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-receipt text-warning icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Compras este Mes</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">7,502.00</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-poll-box text-success icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Monitoreos</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">55</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-account-location text-info icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Capacitaciones</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">30</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h2 class="card-title mb-0">Movimiento de Dinero Mensual</h2>
                                            <div class="wrapper d-flex">
                                                <div class="d-flex align-items-center mr-3">
                                                    <span class="dot-indicator bg-success"></span>
                                                    <p class="mb-0 ml-2 text-muted">Ingresos</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="dot-indicator bg-primary"></span>
                                                    <p class="mb-0 ml-2 text-muted">Egresos</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chart-container">
                                            <canvas id="dashboard-area-chart" height="80"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Cantidad de Cotizaciones</h4>
                                        <canvas class="mt-4" height="100" id="market-overview-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Costo de Cotizaciones S/</h4>
                                        <canvas class="mt-4" height="100" id="chart_cotizaciones_montos"></canvas>
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
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="../../vendors/assets/js/off-canvas.js"></script>
        <script src="../../vendors/assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="../../vendors/assets/js/dashboard.js"></script>




        <!-- End custom js for this page-->
    </body>


    <!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>