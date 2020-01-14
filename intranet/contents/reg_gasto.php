<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agregar GAsto | SEAQ SAC - Software de Gestion </title>
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
                            <form enctype="multipart/form-data" class="form-sample" method="post" action="../controller/reg_contrato.php">
                                <div class="card-header">
                                    <h4 class="h3">Agregar Gasto</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Fecha Inicio</label>
                                        <input type="date" class="col-sm-2 col-form-label" placeholder="" maxlength="11" id="input_fecha_inicio" name="input_fecha_inicio" required>
                                        <label class="col-sm-2 col-form-label">Fecha Fin</label>
                                        <input type="date" class="col-sm-2 col-form-label" placeholder="" maxlength="11" id="input_fecha_fin" name="input_fecha_fin" required>
                                        <label class="col-sm-2 col-form-label">Duracion</label>
                                        <input type="text" class="col-sm-1 col-form-label" id="input_rduracion" name="input_duracion" required/>
                                    </div>
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Monto Pactado</label>
                                        <input type="text" class="col-sm-2 col-form-label" id="input_monto_pactado" name="input_monto_pactado" required/>
                                        <label class="col-sm-2 col-form-label">Monto Pagado</label>
                                        <input type="text" class="col-sm-2 col-form-label" id="input_monto_pagado" name="input_monto_pagado" required/>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Servicio</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input_servicio" name="input_servicio" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Proveedor</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="input_proveedor" id="input_proveedor" required></select>
                                            <option value="-----"></option>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" id="input_telefono" name="input_telefono"/>
                                        </div>
                                        <label class="col-sm-1 col-form-label">tipo</label>
                                        <select  class="col-sm-2 col-form-label" name="input_tipo" id="input_tipo"></select>
                                        <option value="S"></option>
                                        <option value="B"></option>
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

</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>