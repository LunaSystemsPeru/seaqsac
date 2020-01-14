<?php
session_start();
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
        <title>Agregar Orden de Servicio | SEAQ SAC - Software de Gestion </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../../vendors/assets/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../../vendors/assets/images/favicon.png" />
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
                                    <form class="form-sample" enctype="multipart/form-data"  method="post" action="../controller/reg_orden_servicio.php">
                                        <div class="card-header">
                                            <h4 class="h3">Agregar Orden de Servicio - Cliente</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Fecha</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="input_fecha" name="input_fecha" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Cliente</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="select_cliente" id="select_cliente">
                                                        <?php
                                                        $resultado = $c_cliente->ver_clientes();
                                                        while ($row = $resultado->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $row['id_clientes'] ?>"><?php echo $row['razon_social'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nro de orden</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="input_numero" name="input_numero" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Descripcion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_descripcion" name="input_descripcion" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Total</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control text-right" placeholder="0.00" id="input_total" name="input_total" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Cargar Archivo</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" id="input_archivo" name="input_archivo" required/>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success mr-2">Guardar</button>
                                        </div>
                                    </form>
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
        <script src="../../vendors/assets/js/funciones_basicas.js"></script>
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