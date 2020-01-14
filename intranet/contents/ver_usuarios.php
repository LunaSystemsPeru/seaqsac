<?php
session_start();
require '../../models/Usuario.php';
require '../../tools/cl_varios.php';
$c_usuario = new Usuario();
$c_varios = new cl_varios();

?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Usuarios | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Relacion de Usuarios</h4>
                                <button class="btn btn-info" data-target="#modalcrear" data-toggle="modal">
                                    <i class="fa fa-plus"></i>Agregar
                                </button>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Usuario</th>
                                            <th>Datos</th>
                                            <th>ult. Acceso</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_resultado = $c_usuario->ver_filas();
                                        foreach ($a_resultado as $fila) {
                                            ?>
                                            <tr>
                                                <td><?php echo $fila['id_usuarios']?></td>
                                                <td class="text-center"><?php echo $fila['username']?></td>
                                                <td><?php echo $fila['nombre']?></td>
                                                <td class="text-center"><?php echo $c_varios->fecha_mysql_web($fila['fecha_session'])?></td>
                                                <td class="text-center">
                                                    <a href="ver_tipos_categoria.php?id_tipo=1" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
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

            <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="forms-sample" method="post" action="../controller/reg_usuario.php">
                            <div class="color-line"></div>
                            <div class="modal-header text-center">
                                <h4 class="modal-title">Agregar Usuario</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputName1">Usuario </label>
                                    <input type="text" class="form-control" id="input_usuario" name="input_usuario" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Apellidos y Nombres </label>
                                    <input type="text" class="form-control" id="input_datos" name="input_datos" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Email </label>
                                    <input type="email" class="form-control" id="input_email" name="input_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Nro Celular </label>
                                    <input type="text" class="form-control" id="input_celular" name="input_celular" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Contraeña </label>
                                    <input type="text" class="form-control" id="input_pass" name="input_pass" required>
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