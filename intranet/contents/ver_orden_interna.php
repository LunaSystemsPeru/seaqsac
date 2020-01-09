<?php
require 'clases/cl_orden_interna.php';
$c_orden = new cl_orden_interna();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Orden Interna de Trabajo | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/iconfonts/font-awesome/css/font-awesome.min.css"/>
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png"/>
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include 'includes/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include 'includes/sidebar.php' ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">Orden Interna de Trabajo</h4>
                                <button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th width="11%">Fecha Inicio</th>
                                            <th width="11%">Fecha Termino</th>
                                            <th>Cliente</th>
                                            <th>Descripcion</th>
                                            <th>Total</th>
                                            <th>Estado</th>
                                            <th width="13%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_ordenes = $c_orden->ver_filas();
                                        foreach ($a_ordenes as $fila) {
                                            $estado = $fila['estado'];
                                            ?>
                                            <tr>
                                                <td><?php echo $fila['id_orden_interna']?></td>
                                                <td><?php echo $fila['fecha']?></td>
                                                <td><?php echo $fila['fecha_termino']?></td>
                                                <td><?php echo $fila['razon_social']?></td>
                                                <td><?php echo $fila['descripcion']?></td>
                                                <td class="text-right"><?php echo $fila['monto_pactado']?></td>
                                                <td><label class="badge badge-warning badge-lg">Pendiente </label></td>
                                                <td class="text-center">
                                                    <button class="btn btn-success btn-icons" title="Finalizar Servicio">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-icons" title="Eliminar Orden Interna" onclick="eliminar('<?php echo $fila['id_orden_interna']?>')">
                                                        <i class="fa fa-close"></i>
                                                    </button>
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
            <?php include 'includes/footer.php' ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="../vendors/js/vendor.bundle.base.js"></script>
<script src="../vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->

<script>

    $(function () {

        // Initialize Example 1
        $('#tabla').dataTable({
            responsive: true
        });

    });

    function eliminar(codigo) {
        if (!confirm("¿Está seguro de que desea eliminar la Orden Interna Seleccionada?")) {
            return false;
        }
        else {
            document.location = "procesos/del_orden_interna.php?id_orden_interna=" + codigo;
            return true;
        }
    }

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>