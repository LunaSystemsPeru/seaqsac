<?php
require '../../models/Gasto.php';
require '../../models/Banco.php';
require '../../models/TipoClasificacion.php';
require '../../tools/cl_varios.php';

$c_gasto = new Gasto();
$c_banco = new Banco();
$c_tipo = new TipoClasificacion();
$c_varios = new cl_varios();

$c_tipo->setCodigo(4);
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gastos Mensuales | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Relacion de Gastos</h4>
                                <button data-target="#modalcrear" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus"></i>Agregar</button>

                                <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="forms-sample" method="post" action="../controller/reg_gasto.php">
                                                <div class="color-line"></div>
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title">Agregar Gasto</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Fecha </label>
                                                        <input type="date" class="form-control" name="input_fecha" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Caja - Banco </label>
                                                        <select class="form-control" name="select_banco">
                                                            <?php
                                                            $a_resultado = $c_banco->ver_filas();
                                                            foreach ($a_resultado as $fila) {
                                                                ?>
                                                                <option value="<?php echo $fila['id_banco'] ?>"><?php echo $fila['nombre'] . " - Saldo S/ " . number_format($fila['monto'], 2) ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Descripcion </label>
                                                        <input type="text" class="form-control" id="input_descripcion" name="input_descripcion" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Monto </label>
                                                        <input type="number" class="form-control" min="0" id="input_monto" name="input_monto" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Clasificacion Gasto </label>
                                                        <select class="form-control" id="select_tipo" name="select_tipo" onchange="cargar_clase()">
                                                            <?php
                                                            $resultado = $c_tipo->ver_tipos_codigo();
                                                            while ($row = $resultado->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row['id_tipo'] ?>"><?php echo $row['nombre'] ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Caja/Banco</th>
                                            <th>Descripcion</th>
                                            <th>Monto</th>
                                            <th>Clasificacion</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $resultado = $c_gasto->ver_filas();
                                        $saldo = 0;
                                        while ($row = $resultado->fetch_assoc()) {
                                            $saldo += $row['sale'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['id_movimiento'] ?></td>
                                                <td class="text-center"><?php echo $row['fecha'] ?></td>
                                                <td class="text-center"><?php echo $row['banco'] ?></td>
                                                <td><?php echo $row['descripcion'] ?></td>
                                                <td class="text-right"><?php echo number_format($row['sale'], 2) ?></td>
                                                <td class="text-center"><?php echo $row['clasificacion'] ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td class="text-right" colspan="4">TOTAL GASTOS</td>
                                            <td class="text-right"><?php echo number_format($saldo, 2) ?></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
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

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>