<?php
session_start();
require '../../models/Monitoreo.php';
$c_monitoreo = new Monitoreo();
$c_monitoreo->setIdSucursal(filter_input(INPUT_GET, 'sucursal'));
$c_monitoreo->setFecha(date("Y"));
$listaMonitoreo=$c_monitoreo->ver_monitoreos();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Informes de Monitoreos por Cliente | SEAQ SAC - Software de Gestion </title>
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
    <style>
        .clickclet{
            cursor: pointer;
        }
        .clickclet>.card:hover{
            background-color: #e9e7e2;
        }
    </style>
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
                                <h4 class="h3">Monitoreos</h4>
                                <!--button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button-->
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="form-group row">
                                        <label for="exampleInputName2" class="col-md-1">Fecha</label>
                                        <div class="col-md-2">
                                            <select class="form-control ">
                                                <option>2020</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $contador =1;
                    foreach ($listaMonitoreo as $item) {  ?>

                            <div class="clickclet col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body" onclick="ir_monitoreo(<?php echo $item["id_monitoreos"]?>)">
                                        <div class="clearfix">

                                            <div class="float-left">

                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">Monitoreo <?php echo $contador?></h3>
                                                </div>

                                                <p  class="mb-0 text-right" >Tipo: <strong><?php echo $item["ntipo"]?></strong></p>
                                            </div>
                                            <div class="float-right">
                                                <i class="fa fa-bullseye text-danger icon-lg"></i>
                                            </div>
                                        </div>
                                        <p class="mb-0 text-right">Revision: <?php echo $item["fecha_revision"]?></p>
                                    </div>
                                </div>
                            </div>



                    <?php $contador++; }   ?>


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

<script>
    function ir_monitoreo( id){
        location.href ="ver_detaller_monitoreo.php?monitoreio="+id;
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