<?php
session_start();
require 'clases/Monitoreo.php';
$c_monitoreo = new Monitoreo();
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
    <link rel="stylesheet" href="../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png"/>
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include 'fixed/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include 'fixed/sidebar.php' ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">Informe de Monitoreos por Clientes</h4>
                                <button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="13%">Fecha</th>
                                            <th width="40%">Cliente</th>
                                            <th>Ubicacion</th>
                                            <th>Monitoreo</th>
                                            <th>Estado</th>
                                            <th width="12%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($_SESSION['tipo'] == 1) {
                                            $resultado = $c_monitoreo->ver_monitoreos_cliente();
                                        }
                                        if ($_SESSION['tipo'] == 2) {
                                            $resultado = $c_monitoreo->ver_monitoreos_subcontratista();
                                        }
                                        while ($row = $resultado->fetch_assoc()) {
                                            $estado = $row['estado'];
                                            if ($estado == 1) {
                                                $valor_estado = '<label class="badge badge-warning">Pendiente</label>';
                                            }
                                            if ($estado == 2) {
                                                $valor_estado = '<label class="badge badge-info">en Revision</label>';
                                            }
                                            if ($estado == 3) {
                                                $valor_estado = '<label class="badge badge-success">Aprobado</label>';
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $row['fecha'] ?></td>
                                                <td><?php echo $row['razon_social'] ?></td>
                                                <td><?php echo $row['nsucursal'] ?></td>
                                                <td><?php echo $row['ntipo'] . " - " . $row['nsubclase'] ?></td>
                                                <td><?php echo $valor_estado ?></td>
                                                <td>
                                                    <!--<a href="<?php echo $row['url_informe'] ?>" target="_blank" class="btn btn-link btn-xs"><i class="fa fa-download"></i></a>-->
                                                    <a href="ver_monitoreo_detalle.php?id_monitoreo=<?php echo $row['id_monitoreos'] ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
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
            <?php include 'fixed/footer.php' ?>
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
<script src="../js/off-canvas.js"></script>
<script src="../js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../js/dashboard.js"></script>
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