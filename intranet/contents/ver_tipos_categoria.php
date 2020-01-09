<?php
if (is_null(filter_input(INPUT_GET, 'id_tipo'))) {
    header("Location: ver_tipos.php");
}
require 'clases/cl_tipos.php';
$c_tipo = new cl_tipos();
$c_tipo->setId(filter_input(INPUT_GET, 'id_tipo'));
$c_tipo->obtener_datos();

require 'clases/cl_tipo_subclase.php';
$c_clase = new cl_tipo_subclase();
$c_clase->setIdTipo(filter_input(INPUT_GET, 'id_tipo'));
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Generales - nivel III - Tipos | SEAQ SAC - Software de Gestion </title>
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
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../public/assets/images/favicon.png"/>
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
                                <h4 class="h3">Tipo: <?php echo $c_tipo->getNombre()?></h4>
                                <button class="btn btn-info" data-toggle="modal" data-target="#modalcrear"><i class="fa fa-plus"></i>Agregar</button>
                                <a class="btn btn-success" href="ver_tipos.php"><i class="fa fa-arrow-left"></i>Ver Clasificacion</a>

                                <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="forms-sample" method="post" action="../controller/reg_tipo_clasificacion.php">
                                                <div class="color-line"></div>
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title">Agregar Sub Clasificacion</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Nombre</label>
                                                        <input type="text" class="form-control" id="input_nombre" name="input_nombre" required>
                                                        <input type="hidden" name="hidden_id_tipo" value="<?php echo $c_tipo->getId() ?>">
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
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th width="18%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $resultado = $c_clase->ver_clases();
                                        while ($row = $resultado->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id_subclase'] ?></td>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td>
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
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<script src="../../vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../public/assets/js/off-canvas.js"></script>
<script src="../public/assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../public/assets/js/dashboard.js"></script>
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