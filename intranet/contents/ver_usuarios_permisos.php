<?php
include 'cabeza.php';
require '../../models/UsuarioPermiso.php';
require '../../models/Usuario.php';

$permiso = new UsuarioPermiso();
$permiso->setIdUsuario(filter_input(INPUT_GET, 'id'));
if (!$permiso->getIdUsuario()) {
    header("Location: ../ver_usuarios.php");
}

$c_usuario = new Usuario();
$c_usuario->setIdUsuario(filter_input(INPUT_GET, 'id'));
$c_usuario->obtener_datos();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Definir Permisos a Usuario | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Relacion de Permisos</h4>
                                <a href="ver_usuarios.php" type="button" class="btn btn-info"><i
                                            class="fa fa-arrow-left"></i>ver usuarios</a>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Usuario </label>
                                            <input type="text" class="form-control" id="input_usuario"
                                                   value="<?php echo $c_usuario->getUsername() ?>"
                                                   name="input_usuario"
                                                   readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Apellidos y Nombres </label>
                                            <input type="text" class="form-control" id="input_datos" name="input_datos"
                                                   value="<?php echo $c_usuario->getNombre() ?>"
                                                   readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Email </label>
                                            <input type="email" class="form-control" id="input_email" name="input_email"
                                                   value="<?php echo $c_usuario->getEmail() ?>"
                                                   readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Nro Celular </label>
                                            <input type="text" class="form-control" id="input_celular"
                                                   value="<?php echo $c_usuario->getCelular() ?>"
                                                   name="input_celular"
                                                   readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Contraeña </label>
                                            <input type="text" class="form-control" id="input_pass" name="input_pass"
                                                   value="<?php echo $c_usuario->getContrasena() ?>"
                                                   readonly>
                                        </div>
                                        <div id="image_preview">
                                            <img id="previewing" class="col-md-12"
                                                 src="../../archivos/empleados/perfil/<?php echo $c_usuario->getFoto() ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <form class="forms-sample" method="post" action="../controller/reg_permiso_usuario.php">
                                            <input type="hidden" name="id" value="<?php echo $c_usuario->getIdUsuario()?>">
                                        <div class="table-responsive">
                                                <table id="tabla" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Permiso</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $resultado = $permiso->verFilas();
                                                    while ($row = $resultado->fetch_assoc()) {
                                                        $valor_check = "checked";
                                                        if ($row['permiso'] == 0) {
                                                            $valor_check = "";
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" value="<?php echo $row['id_permiso'] ?>" name="input_permiso[]" <?php echo $valor_check ?>>
                                                                            <?php echo $row['nombre'] ?>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar Permisos</button>
                                            </form>
                                        </div>
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
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../vendors/assets/js/dashboard.js"></script>
<!-- End custom js for this page-->

<script>

    $(function () {

        // Initialize Example 1


    });

    function eliminar(id) {
        $.ajax({
            type: "GET",
            url: '../controller/del_empresa.php?id_tido=' + id,
            success: function (respuesta) {
                console.log("error: " + respuesta);
                if (IsJsonString(respuesta)) {
                    location.reload();
                } else {
                    alert("No se puede eliminar");
                }
            }

        });
    }

    function IsJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>