<?php
include 'cabeza.php';
require '../../models/Proveedor.php';
$c_proveedor = new Proveedor();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Proveedores | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Relacion de Proveedores</h4>
                                <a href="reg_proveedor.php" class="btn btn-info"><i class="fa fa-plus"></i>Agregar</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>RUC</th>
                                            <th>Razon Social</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th width="15%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $resultado = $c_proveedor->ver_filas();
                                        while ($row = $resultado->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['ruc'] ?></td>
                                                <td><?php echo $row['razon_social'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td class="text-center"><?php echo $row['telefono'] ?></td>
                                                <td class="text-center">
                                                    <a href="reg_proveedor.php?id=<?php echo $row['id_proveedores'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button onclick="eliminar(<?php echo $row['id_proveedores'] ?>)" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
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

    function eliminar(idP) {

        if (!confirm("¿Está seguro de que desea eliminar el Equipo Seleccionado?")) {
            return false;
        }
        else {
            $.ajax({
                type: "GET",
                url: "../controller/del_proveedor.php?idP="+idP,
                success: function (data) {
                    console.log(data);
                    if (IsJsonString(data)){
                        location.reload();
                    } else{
                        alert("No de pudo eliminar este Proveedor");
                    }
                }
            });
            return true;
        }
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