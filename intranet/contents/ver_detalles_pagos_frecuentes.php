<?php
require '../../models/Proveedor.php';
$c_proveedor = new Proveedor();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detalle de los Pagos Frecentes | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Detalle de Pago Frecuete</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detalle del Contrato</h4>
                                <div class="add-items d-flex">
                                    <button class="btn btn-behance"><i class="fa fa-edit"></i>Modificar Pago</button>
                                    <button class="btn btn-success"><i class="fa fa-sign-out"></i>Pasar a sgt mes
                                    </button>
                                </div>
                                <div class="add-items d-flex">
                                    <button class="btn btn-warning"><i class="fa fa-stop"></i>Detener Frecuencia
                                    </button>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</button>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Codigo Pago:</label>
                                    <label for="">8</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Proveedor:</label>
                                    <label for="">Lunasystems Peru</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Servicio:</label>
                                    <label for="">Celular</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Servicio:</label>
                                    <label for="">Celular</label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Frecuencia:</label>
                                    <label for="">1</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha recordatorio:</label>
                                    <label for="">2020-01-20</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Dias Faltantes:</label>
                                    <label for="">12 dias</label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Total a Pagar:</label>
                                    <label for="">78.00</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Total Pagado:</label>
                                    <label for="">0.00</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Estado:</label>
                                    <label class="badge badge-warning" for="">Pendiente</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ver Pago de este Periodo</h4>
                                <div class="panel-body">
                                    <a href="reg_pago_frecuente.php" class="btn btn-behance"><i class="fa fa-plus"></i>Agregar</a>
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

                        <div class="card">
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