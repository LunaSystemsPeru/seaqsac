<?php
require '../../models/BancoMovimiento.php';
require '../../models/Banco.php';
require '../../tools/cl_varios.php';

$c_movimiento = new BancoMovimiento();
$c_banco = new Banco();
$c_varios = new cl_varios();

if (filter_input(INPUT_GET, 'id_banco')) {
    $c_banco->setIdBanco(filter_input(INPUT_GET, 'id_banco'));
    $c_banco->obtener_datos();
    $c_movimiento->setIdBanco($c_banco->getIdBanco());
} else {
    header("Location: ver_bancos.php");
}
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Movimientos de Banco | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Movimientos Mensuales del Banco </h4>
                                <h4 class="h3"><?php echo $c_banco->getNombre() . " - Cuenta nro: " . $c_banco->getNroCuenta()?></h4>
                                <a href="ver_bancos.php" class="btn btn-success"><i class="fa fa-arrow-left"></i>ver Bancos</a>
                                <button class="btn btn-info" data-target="#modalcrear" data-toggle="modal"><i class="fa fa-dollar"></i>Transferir</button>
                            </div>

                            <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form class="forms-sample" method="post" action="../controller/reg_transferencia_banco.php">
                                            <div class="color-line"></div>
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Agregar Transferencia entre Cuentas</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Banco </label>
                                                    <select class="form-control" name="select_otro_banco">
                                                        <?php
                                                        foreach ($c_banco->ver_otros_bancos() as $fila) {
                                                            ?>
                                                            <option value="<?php echo $fila['id_banco']?>"><?php echo $fila['nombre'] . " Saldo: " . $fila['monto']?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Fecha </label>
                                                    <input type="date" class="form-control" id="input_fecha" name="input_fecha" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Monto Actual </label>
                                                    <input type="text" class="form-control" id="input_actual" name="input_actual" value="<?php echo $c_banco->getMonto()?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Monto a Transferir</label>
                                                    <input type="number" min="1" max="<?php echo $c_banco->getMonto()?>" class="form-control" id="input_monto" name="input_monto" required>
                                                    <input type="hidden" name="hidden_id_envia" value="<?php echo $c_banco->getIdBanco()?>">
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">Id</th>
                                            <th width="10%">Fecha</th>
                                            <th>Descripcion</th>
                                            <th width="10%">Ingresa</th>
                                            <th width="10%">Sale</th>
                                            <th width="10%">Saldo</th>
                                            <th width="15%">Clasificacion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $resultado = $c_movimiento->ver_filas();
                                        $item = 1;
                                        $saldo = $c_movimiento->verSaldoAnterior();
                                        ?>
                                        <tr>
                                            <td>0</td>
                                            <td><?php echo $c_varios->fecha_mysql_web($c_varios->_primer_dia_mes()) ?></td>
                                            <td><?php echo "SALDO ANTERIOR" ?></td>
                                            <td class="text-right"><?php echo number_format($saldo,2) ?></td>
                                            <td class="text-right"><?php echo number_format(0,2) ?></td>
                                            <td class="text-right"><?php echo number_format($saldo,2) ?></td>
                                            <td class="text-center"><?php echo "SALDO" ?></td>
                                        </tr>
                                        <?php
                                        while ($row = $resultado->fetch_assoc()) {
                                            $saldo += ($row['ingresa'] - $row['sale']);
                                            ?>
                                            <tr>
                                                <td><?php echo $item ?></td>
                                                <td><?php echo $c_varios->fecha_mysql_web($row['fecha']) ?></td>
                                                <td><?php echo $row['descripcion'] ?></td>
                                                <td class="text-right"><?php echo number_format($row['ingresa'],2) ?></td>
                                                <td class="text-right"><?php echo number_format($row['sale'],2) ?></td>
                                                <td class="text-right"><?php echo number_format($saldo,2) ?></td>
                                                <td class="text-center"><?php echo $row['clasificacion'] ?></td>
                                            </tr>
                                            <?php
                                            $item++;
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