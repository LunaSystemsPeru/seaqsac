<?php
session_start();
require '../../models/Monitoreo.php';
$c_monitoreo = new Monitoreo();
$listaSucursales=$c_monitoreo->sucursales();
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
                                <h4 class="h3">Sucursales</h4>
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
                    <?php foreach ($listaSucursales as $item) {  ?>

                            <div class="clickclet col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body" onclick="ir_monitoreo(<?php echo $item["id_sucursal"]?>)">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="fa fa-cubes text-danger icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Sucursal <?php echo $item["id_sucursal"]?></p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0"><?php echo $item["nombre"]?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0" style="font-size: 10px">
                                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i><?php echo $item["direccion"]?></p>
                                    </div>
                                </div>
                            </div>



                    <?php }?>


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
        console.log("holaaaaaaaa");
        location.href ="ver_informe_monitoreos.php?sucursal="+id;
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