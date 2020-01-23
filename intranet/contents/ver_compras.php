<?php
require '../../models/Compra.php';
require '../../tools/cl_varios.php';

$c_compra = new Compra();
$c_varios = new cl_varios();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Documentos de Compras | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Compras por Periodo</h4>
                                <a href="reg_documento_compra.php" class="btn btn-info"><i class="fa fa-plus"></i>Agregar Documento</a>
                                <button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="10%">Fecha</th>
                                            <th>Documento</th>
                                            <th>Proveedor</th>
                                            <th>Total</th>
                                            <th>Deuda</th>
                                            <th>Estado</th>
                                            <th width="18%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_compras = $c_compra->ver_filas();
                                        foreach ($a_compras as $fila) {
                                            $doc_sunat = $fila['doc_sunat'] . " | " . $fila['serie'] . " - " . $fila['numero'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $c_varios->fecha_mysql_web($fila['fecha'])?></td>
                                                <td class="text-center"><a href="../../archivos/compras/a.pdf" target="_blank" ><?php echo $doc_sunat?></a></td>
                                                <td><?php echo $fila['razon_social']?></td>
                                                <td class="text-right"><?php echo number_format($fila['total'],2)?></td>
                                                <td class="text-right"><?php echo number_format($fila['total'] - $fila['pagado'],2)?></td>
                                                <td><label class="badge badge-warning">Pendiente </label></td>
                                                <td>
                                                    <button class="btn btn-info btn-icons"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-success btn-icons"><i class="fa fa-dollar"></i></button>
                                                    <button class="btn btn-danger btn-icons"><i class="fa fa-close"></i></button>
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