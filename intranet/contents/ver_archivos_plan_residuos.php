<?php
require 'cabeza.php';
require '../../models/PlanResiduos.php';

$planResiduos = new PlanResiduos();


?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bancos | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="../../vendors/jquery.uploadfile/uploadfile.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../vendors/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../vendors/assets/images/favicon.png"/>
    <link href="../../vendors/select2/css/select2.css" rel="stylesheet"/>

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
                                <h4 class="h3">Archivos</h4>

                            </div>

                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Archivos Subidos</h4>
                                    <div class="file-upload-wrapper">
                                        <div id="fileuploader">
                                            <div class="ajax-upload-dragdrop"
                                                 style="vertical-align: top; width: 400px;">
                                                <div class="ajax-file-upload"
                                                     style="position: relative; overflow: hidden; cursor: default;">
                                                    Upload
                                                    <form method="POST" action="../controller/ajax/guardar_archivos.php"
                                                          enctype="multipart/form-data"
                                                          style="margin: 0px; padding: 0px;">
                                                        <input type="file"
                                                               id="ajax-upload-id-1583538033741"
                                                               name="myfile[]"
                                                               accept="application/pdf"
                                                               multiple=""
                                                               style="position: absolute; cursor: pointer; top: 0px; width: 100%; height: 100%; left: 0px; z-index: 100; opacity: 0;">
                                                    </form>
                                                </div>
                                                <span><b>Drag &amp; Drop Files</b></span></div>
                                            <div></div>
                                        </div>
                                        <div class="ajax-file-upload-container"></div>
                                    </div>
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
<script src="../../vendors/jquery.uploadfile/jquery.uploadfile.min.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../vendors/assets/js/dashboard.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../vendors/select2/js/select2.js"></script>


<!-- End custom js for this page-->

<script>
    (function($) {
        'use strict';
        if ($("#fileuploader").length) {
            $("#fileuploader").uploadFile({
                url: "YOUR_FILE_UPLOAD_URL",
                fileName: "myfile"
            });
        }
    })(jQuery);

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>