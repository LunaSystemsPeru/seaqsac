<?php
include 'cabeza.php';
require '../../models/Venta.php';
$c_venta = new Venta();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Ventas | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Ventas por Periodo</h4>
                                <a href="reg_documento_venta.php" class="btn btn-info"><i class="fa fa-plus"></i>Agregar Documento</a>
                                <button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="11%">Fecha</th>
                                            <th width="11%">Documento</th>
                                            <th>Cliente</th>
                                            <th>OTI</th>
                                            <th>O/S</th>
                                            <th width="10%">Total</th>
                                            <th>por Cobrar</th>
                                            <th>Estado</th>
                                            <th width="13%" class="text-center">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_ventas = $c_venta->ver_filas();
                                        $total = 0;
                                        $deuda = 0;
                                        foreach ($a_ventas as $fila) {
                                            $total += $fila['total'];
                                            $deuda += $fila['total'] - $fila['pagado'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $fila['fecha'] ?></td>
                                                <td class="text-center">
                                                    <a href="../../archivos/ventas/<?php echo $fila['archivo'] ?>" target="_blank">
                                                        <?php echo $fila['abreviado'] . " | " . $fila['serie'] . " - " . $fila['numero'] ?>
                                                    </a>
                                                </td>
                                                <td><?php echo $fila['razon_social'] ?></td>
                                                <td class="text-center"><?php echo $fila['id_orden_interna'] ?></td>
                                                <td class="text-center"><?php echo $fila['numero_orden'] ?></td>
                                                <td class="text-right"><?php echo number_format($fila['total'], 2) ?></td>
                                                <td class="text-right"><?php echo number_format($fila['total'] - $fila['pagado'], 2) ?></td>
                                                <td><label class="badge badge-warning">Pendiente </label></td>
                                                <td>
                                                    <a href="ver_venta_cobro.php?venta=<?php echo $fila['id_ventas'] ?>" class="btn btn-success btn-icons"><i class="fa fa-dollar"></i></a>
                                                    <button class="btn btn-danger btn-icons" title="Eliminar Documento de Venta" onclick="eliminar('<?php echo $fila['id_ventas'] ?>')"><i class="fa fa-close"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        $porcentaje_deuda = 0;
                                        if ($total > 0) {
                                            $porcentaje_deuda = $deuda / $total * 100;
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td class="text-right" colspan="5">TOTALES</td>
                                            <td class="text-right"><?php echo number_format($total, 2) ?></td>
                                            <td class="text-right"><?php echo number_format($deuda, 2) ?></td>
                                            <td class="text-right"><?php echo number_format($porcentaje_deuda, 2) ?> %</td>
                                            <td></td>
                                        </tr>
                                        </tfoot>
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

    function eliminar(codigo) {
        if (!confirm("¿Está seguro de que desea eliminar el Documento Seleccionado?")) {
            return false;
        } else {
            document.location = "../controller/del_documento_venta.php?id_venta=" + codigo;
            return true;
        }
    }

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>