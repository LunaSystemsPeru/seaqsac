<?php
require 'clases/Equipo.php';
$c_equipo = new Equipo();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Equipos | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/iconfonts/font-awesome/css/font-awesome.min.css"/>
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png"/>
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
                                <h4 class="h3">Listar Equipos</h4>
                                <a href="reg_equipo.php" class="btn btn-info"><i class="fa fa-plus"></i>Agregar Equipo de Medicion</a>
                                <button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Id.</th>
                                            <th>Nombre</th>
                                            <th>Renovacion</th>
                                            <th>Fecha Calibracion</th>
                                            <th>Costo Alquiler</th>
                                            <th>Estado</th>
                                            <th width="18%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_equipos = $c_equipo->ver_filas();
                                        foreach ($a_equipos as $fila) {
                                            ?>
                                            <tr>
                                                <td><?php echo $fila['id_equipo']?></td>
                                                <td><?php echo $fila['nombre'] . " " . $fila['marca'] . " " . $fila['modelo'] . " " . $fila['serie']?></td>
                                                <td><?php echo $fila['id_equipo']?></td>
                                                <td><?php echo $fila['ultima_calibracion']?></td>
                                                <td><?php echo $fila['costo_alquiler']?></td>
                                                <td><label class="badge badge-success badge-lg">Normal </label></td>
                                                <td>
                                                    <a href="../archivos/equipos/<?php echo $fila['certificado']?>" target="_blank" class="btn btn-link btn-icons"><i class="fa fa-download"></i></a>
                                                    <button class="btn btn-info btn-icons"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-icons" onclick="eliminar('<?php echo $fila['id_equipo']?>')" title="Eliminar Equipo">
                                                        <i class="fa fa-close"></i>
                                                    </button>
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
<script src="../vendors/js/vendor.bundle.base.js"></script>
<script src="../vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->

<script>

    $(function () {

        // Initialize Example 1
        $('#tabla').dataTable({
            responsive: true
        });

    });

    function eliminar(codigo) {
        if (!confirm("¿Está seguro de que desea eliminar el Equipo Seleccionado?")) {
            return false;
        }
        else {
            document.location = "procesos/del_equipo.php?id_equipo=" + codigo;
            return true;
        }
    }


</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>