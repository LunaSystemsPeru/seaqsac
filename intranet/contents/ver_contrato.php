<?php
require '../../models/Contrato.php';
$c_contrato = new Contrato();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contratos | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Relacion de Contratos</h4>
                                <a href="reg_contrato.php" class="btn btn-info"><i class="fa fa-plus"></i>Agregar</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Servicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Dias Faltantes</th>
                                            <th>Monto Total</th>
                                            <th>%Pagado</th>
                                            <th>por Pagar</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $resultado = $c_contrato->ver_filas();
                                        while ($row = $resultado->fetch_assoc()) {
                                            $badge_dias ="badge-success";
                                            if ($row['dias_restantes'] > 0) {
                                                $badge_dias ="badge-success";
                                            } elseif ($row['dias_restantes'] == 0) {
                                                $badge_dias ="badge-warning";
                                            } else {
                                                $badge_dias ="badge-danger";
                                            }

                                            $badge_pagado ="badge-success";
                                            if ($row['porcentaje_pagado'] > 0) {
                                                $badge_pagado ="badge-success";
                                            } elseif ($row['porcentaje_pagado'] == 0) {
                                                $badge_pagado ="badge-warning";
                                            } else {
                                                $badge_pagado ="badge-danger";
                                            }
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['id_contrato']?></td>
                                                <td><?php echo $row['servicio']?></td>
                                                <td><?php echo $row['fecha_fin_aprox']?></td>
                                                <td class="text-center">
                                                    <div class="badge <?php echo $badge_dias?>"><?php echo $row['dias_restantes']?> dias</div>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo number_format($row['monto_pactado'],2)?>
                                                </td>
                                                <td>
                                                    <div class="badge <?php echo $badge_pagado?>"><?php echo number_format($row['porcentaje_pagado'],2)?>%</div>
                                                </td>
                                                <td><?php echo number_format($row['faltante_pagar'],2)?></td>
                                                <td>
                                                    <div class="badge badge-success">Activo</div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i></a>
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