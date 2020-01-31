<?php
session_start();
require '../../models/Usuario.php';

$c_usuario = new Usuario();
$estado=false;
if (filter_input(INPUT_GET, 'id')) {
    $c_usuario->setIdUsuario(filter_input(INPUT_GET, 'id'));
} else {
    $c_usuario->setIdUsuario($_SESSION['id_usuario']);
}
$c_usuario->obtener_datos();
$estado=true;
?>

<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modificar mi Perfil | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="../../vendors/jquery-toast-plugin/jquery.toast.min.css">
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
                            <form enctype="multipart/form-data" class="form-sample" method="post" action="../controller/mod_usuario.php">
                                <div class="card-header">
                                    <h4 class="h3">Modificar Perfil de Usuario</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Usuario </label>
                                                <input type="text" class="form-control" id="input_usuario" value="<?php echo $c_usuario->getUsername()?>"
                                                       name="input_usuario"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Apellidos y Nombres </label>
                                                <input type="text" class="form-control" id="input_datos" name="input_datos" value="<?php echo $c_usuario->getNombre()?>"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Email </label>
                                                <input type="email" class="form-control" id="input_email" name="input_email" value="<?php echo $c_usuario->getEmail()?>"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Nro Celular </label>
                                                <input type="text" class="form-control" id="input_celular" value="<?php echo $c_usuario->getCelular()?>"
                                                       name="input_celular"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Contraeña </label>
                                                <input type="text" class="form-control" id="input_pass" name="input_pass" value="<?php echo $c_usuario->getContrasena()?>"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="image_preview">
                                                <img id="previewing" class="col-md-12" src="../../archivos/empleados/perfil/<?php echo $c_usuario->getFoto()?>"/>
                                            </div>
                                            <hr id="line">
                                            <div id="selectImage form-group">
                                                <!--input class="form-control" type="file" name="file" id="file" required/-->
                                                <div class="form-group">
                                                    <input accept="image/*"  id="file" type="file" name="file" class="file-upload-default">
                                                    <div class="input-group col-xs-12">
                                                        <input id="nom_archivo" type="text" class="form-control file-upload-info" disabled=""
                                                               placeholder="selecione">
                                                        <span class="input-group-append">
                                                            <button onclick="selectArchivo()" class="file-upload-browse btn btn-info"
                                                                    type="button"><i class="fa fa-cloud-upload"></i>Subir</button>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div id="message"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="hidden_id_usuario" value="<?php echo $c_usuario->getIdUsuario()?>">
                                    <a href="ver_usuarios.php" class="btn btn-info mr-2"><i class="fa fa-arrow-left"></i> Regresar</a>
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
<script src="../../vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
<script src="../../vendors/assets/js/funciones_basicas.js"></script>
<!-- End custom js for this page-->

<script>

    $(document).ready(function (e) {
        // Function to preview image after validation
        $(function () {
            $("#file").change(function () {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    $('#previewing').attr('src', 'images/faces/face2.jpg');
                    $("#message").html("<p id='error'>Porfavor seleccione un archivo valido</p>"
                        + "<h4>Nota</h4>"
                        + "<span id='error_message'>solamente jpeg, jpg y png son tipos permitidos</span>");
                    return false;
                } else {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                    $('#nom_archivo').val($(this).val().replace(/C:\\fakepath\\/i, ''));
                }
            });
        });

        function imageIsLoaded(e) {
            $("#file").css("color", "green");
            $('#image_preview').css("display", "block");
            $('#previewing').attr('src', e.target.result);
            $('#previewing').attr('width', '280px');
            //$('#previewing').attr('height', '300px');
        }
    });
</script>



<script>

    function selectArchivo() {
        $('#file').trigger('click');
    }

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>