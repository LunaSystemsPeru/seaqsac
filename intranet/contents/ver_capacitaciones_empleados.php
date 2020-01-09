<?php
if (is_null(filter_input(INPUT_GET, 'id_capacitacion'))) {
    header("Location: ver_capacitaciones_clientes.php");
}
require 'clases/cl_capacitacion.php';
$c_capacitacion = new cl_capacitacion();
$c_capacitacion->setIdCapacitacion(filter_input(INPUT_GET, 'id_capacitacion'));
$c_capacitacion->obtener_datos();

require 'clases/cl_tipos.php';
$c_tipo = new cl_tipos();
$c_tipo->setId($c_capacitacion->getIdTipo());
$c_tipo->obtener_datos();

require 'clases/cl_cliente.php';
$c_cliente = new cl_cliente();
$c_cliente->setIdCliente($c_capacitacion->getIdCliente());
$c_cliente->obtener_datos();

require 'clases/cl_capacitacion_asistente.php';
$c_asistente = new cl_capacitacion_asistente();
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
                                <button class="btn btn-info" data-toggle="modal" data-target="#modalbuscar"><i class="fa fa-plus"></i> Agregar Colaborador</button>
                                <a href="ver_capacitaciones_clientes.php" class="btn btn-success"><i class="fa fa-arrow-left"></i> Ver Capacitaciones</a>

                                <div class="modal fade" id="modalbuscar" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="forms-sample" method="post" action="procesos/reg_capacitacion_empleado.php">
                                                <div class="color-line"></div>
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title">Agregar Asistente</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Nro de DNI:</label>
                                                        <div class="input-group col-xs-12">
                                                            <input type="text" class="form-control" placeholder="Ingrese DNI" id="input_dni" name="input_dni" maxlength="8">
                                                            <span class="input-group-append">
                                                                        <button class="btn btn-info" type="button" onclick="enviar_dni()"><i class="fa fa-search"></i> Validar DNI</button>
                                                                    </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Apellidos y Nombres: </label>
                                                        <input type="text" class="form-control" id="input_datos" name="input_datos" readonly>
                                                        <input type="hidden" id="hidden_id_capacitacion" name="hidden_id_capacitacion" value="<?php echo $c_capacitacion->getIdCapacitacion() ?>">
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
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
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
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<script src="js/funciones_basicas.js"></script>
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