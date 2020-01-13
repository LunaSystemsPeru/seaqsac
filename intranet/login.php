<?php
$id_error = 0;
if (is_null(filter_input(INPUT_GET, 'error'))) {
    $id_error = 0;
} else {
    $id_error = filter_input(INPUT_GET, 'error');
}
?>
<!DOCTYPE html>
<html lang="es">


    <!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:38:15 GMT -->
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Acceso Intranet - SEAQ SAC - Software de Gestion</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../vendors/iconfonts/puse-icons-feather/feather.css">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../vendors/assets/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../vendors/assets/images/favicon.png" />
    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
                <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auto-form-wrapper">
                                <form action="controller/login.php" method="post">
                                    <div class="form-group">
                                        <img src="../vendors/assets/images/logo_Seaq.png" style="max-width: 100%">
                                    </div>
                                    <hr>
                                    <?php
                                    if ($id_error == 1) {
                                        ?>
                                        <div class="form-group">
                                            <div class="alert alert-danger text-center">
                                                <span > Usuario no Existe</span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($id_error == 2) {
                                        ?>
                                        <div class="form-group">
                                            <div class="alert alert-warning text-center">
                                                <span > Datos Incorrectos</span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label class="label">Usuario</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="USUARIO" name="input_usuario">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" placeholder="*********" name="input_password">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary submit-btn btn-block">Login</button>
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                                    </div>
                                </form>
                            </div>
                            <ul class="auth-footer">
                                <li>
                                    <a href="#">Privacidad</a>
                                </li>
                                <li>
                                    <a href="#">Ayuda</a>
                                </li>
                            </ul>
                            <p class="footer-text text-center">copyright © <?php echo date("Y") ?>. SEAQ SAC.</p>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../vendors/js/vendor.bundle.base.js"></script>
        <script src="../vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="../vendors/assets/js/off-canvas.js"></script>
        <script src="../vendors/assets/js/hoverable-collapse.html"></script>
        <script src="../vendors/assets/js/misc.js"></script>
        <script src="../vendors/assets/js/settings.html"></script>
        <script src="../vendors/assets/js/todolist.html"></script>
        <!-- endinject -->
    </body>


    <!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:38:24 GMT -->
</html>