<?php
if (is_null(filter_input(INPUT_GET, 'id_capacitacion'))) {
    header("Location: ver_capacitaciones_clientes.php");
}
require 'clases/Capacitacion.php';
$c_capacitacion = new Capacitacion();
$c_capacitacion->setIdCapacitacion(filter_input(INPUT_GET, 'id_capacitacion'));
$c_capacitacion->obtener_datos();

require 'clases/TipoClasificacion.php';
$c_tipo = new TipoClasificacion();
$c_tipo->setId($c_capacitacion->getIdTipo());
$c_tipo->obtener_datos();

require 'clases/Cliente.php';
$c_cliente = new Cliente();
$c_cliente->setIdCliente($c_capacitacion->getIdCliente());
$c_cliente->obtener_datos();

require 'clases/CapacitacionAsistente.php';
$c_asistente = new CapacitacionAsistente();
$c_asistente->setIdCapacitacion($c_capacitacion->getIdCapacitacion());
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Asistentes para Interrupcion de Trabajos de alto riesgo | SEAQ SAC - Software de Gestion </title>
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
    <link rel="stylesheet" href="../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png"/>
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include 'fixed/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include 'fixed/sidebar.php' ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">Datos de la Capacitacion</h4>
                            </div>
                            <div class="card-body">
                                <p><span class="font-weight-bold">Nombre =</span> <?php echo $c_capacitacion->getNombre() ?></p>
                                <p><span class="font-weight-bold">Cliente =</span> <?php echo $c_cliente->getRazonSocial() ?></p>
                                <p><span class="font-weight-bold">Tipo =</span> <?php echo $c_tipo->getNombre() ?></p>
                                <p><span class="font-weight-bold">Fecha =</span> <?php echo $c_capacitacion->getFecha() ?></p>
                                <p><span class="font-weight-bold">Tot. Horas =</span> <?php echo $c_capacitacion->getTotHoras() ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">Relacion de Asistentes</h4>
                                <a href="ver_capacitaciones_clientes.php" class="btn btn-success"><i class="fa fa-arrow-left"></i> Ver Capacitaciones</a>
                                <br>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="max-width: 100%">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>DNI</th>
                                            <th>Apellidos y Nombres</th>
                                            <th>Codigo</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $resultado = $c_asistente->ver_asistentes();
                                        while ($row = $resultado->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['dni'] ?></td>
                                                <td><?php echo $row['datos'] ?></td>
                                                <td><?php echo $row['id_capacitaciones'] . $row['id_clientes'] . $row['id_tipo'] . $row['id_asistente'] ?></td>
                                                <td>
                                                    <a href="reportes/pdf_certificado_capacitacion.php?id_capacitacion=<?php echo $row['id_capacitaciones'] ?>&id_asistente=<?php echo $row['id_asistente'] ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a>
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
            <?php include 'fixed/footer.php' ?>
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
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../js/off-canvas.js"></script>
<script src="../js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../js/dashboard.js"></script>
<script src="../js/funciones_basicas.js"></script>
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