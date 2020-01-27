<?php
require '../../models/Cliente.php';
$c_cliente = new Cliente();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clientes | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.min.css"/>
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->e.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../vendors/assets/images
    <!-- inject:css -->
    <link rel="stylesheet" href="../../vendors/assets/css/styl/favicon.png"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

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
                                <h4 class="h3">Relacion de Clientes</h4>
                                <a href="reg_cliente.php" class="btn btn-info"><i class="fa fa-plus"></i>Agregar</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table id="tabla" class="table table-striped ">
                                        <thead>
                                        <tr>
                                            <th>RUC</th>
                                            <th>Razon Social</th>
                                            <th>Tipo</th>
                                            <th>Ultima Accion</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $resultado = $c_cliente->ver_clientes();
                                        while ($row = $resultado->fetch_assoc()) {
                                            $tipo = $row['tipo'];
                                            if ($tipo == 1) {
                                                $valor_tipo = "Propio";
                                            }
                                            if ($tipo == 2) {
                                                $valor_tipo = "Tercero";
                                            }
                                            $estado = $row['estado'];
                                            if ($estado == 1) {
                                                $valor_estado = '<label class="badge badge-success">Normal</label>';
                                            }
                                            if ($estado == 2) {
                                                $valor_estado = '<label class="badge badge-warning">Deudor</label>';
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $row['ruc'] ?></td>
                                                <td><?php echo $row['razon_social'] ?></td>
                                                <td><?php echo $valor_tipo ?></td>
                                                <td><?php echo $row['ultimo_servicio'] ?></td>
                                                <td>
                                                    <?php echo $valor_estado ?>
                                                </td>
                                                <td>
                                                    <a href="ver_clientes_sucursal.php?id_cliente=<?php echo $row['id_clientes'] ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a href="reg_cliente.php?id=<?php echo $row['id_clientes'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
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

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script>

    $(document).ready(function() {
        $('#tabla').DataTable( {
            responsive: true,
            order: [[ 1, "asc" ]],
            dom: 'Bfrtip',
            buttons: [
                 'excel', 'pdf', 'print'
            ]
        } );
    } );

</script>"order": [[ 1, "asc" ]]
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>