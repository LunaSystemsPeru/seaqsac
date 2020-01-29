<?php
require '../../models/Presupuesto.php';
$c_pesupuesto = new Presupuesto();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Presupuestos | Cotizaciones | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
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
                                <h4 class="h3">Presupuestos | Cotizaciones a Clientes</h4>
                                <a href="reg_presupuesto.php" class="btn btn-info"><i class="fa fa-plus"></i>Agregar</a>
                                <button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="13%">Fecha</th>
                                            <th>Codigo</th>
                                            <th>Cliente</th>
                                            <th>Descripcion</th>
                                            <th>Total</th>
                                            <th>Estado</th>
                                            <th width="18%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $c_pesupuesto->setAnio(date("Y"));
                                        $a_presupuesto = $c_pesupuesto->ver_filas();
                                        foreach ($a_presupuesto as $fila) {
                                            if ($fila['estado'] == 0) {
                                                $label = '<label class="badge badge-warning badge-lg">Pendiente </label>';
                                            }
                                            if ($fila['estado'] == 1) {
                                                $label = '<label class="badge badge-success badge-lg">Aprobado </label>';
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $fila['fecha'] ?></td>
                                                <td><?php echo $fila['id_cotizaciones'] ?></td>
                                                <td><?php echo $fila['razon_social'] ?></td>
                                                <td><?php echo $fila['descripcion'] ?></td>
                                                <td class="text-right"><?php echo number_format($fila['total'], 2) ?></td>
                                                <td><?php echo $label ?></td>
                                                <td class="text-center">
                                                    <a href="reg_email_cotizacion.php?coti=<?php echo $fila['id_cotizaciones'] ?>" class="btn btn-info btn-icons" title="Enviar por Correo">
                                                        <i class="fa fa-mail-reply-all"></i>
                                                    </a>
                                                    <?php
                                                    if ($fila['estado'] == 0) {
                                                        ?>
                                                        <button type="button" class="btn btn-success btn-icons" title="Aprobar Cotizacion" onclick="obtener_modal('<?php echo $fila['id_cotizaciones'] ?>')">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-icons" title="Eliminar Cotizacion" onclick="eliminar('<?php echo $fila['id_cotizaciones'] ?>')">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                        <?php
                                                    }
                                                    ?>
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

            <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" id="resultado">
                    </div>
                </div>
            </div>
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

    function obtener_modal(id_cotizacion) {
        var parametros = {
            "id_cotizacion": id_cotizacion
        };
        $.ajax({
            data: parametros,
            url: '../../data/modals/m_aprobar_cotizacion.php',
            type: 'post',
            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                $("#resultado").html(response);
                $("#modalcrear").modal("toggle");
            }
        });
    }

    function eliminar(codigo) {
        if (!confirm("¿Está seguro de que desea eliminar la Cotizacion Seleccionada?")) {
            return false;
        }
        else {
            document.location = "../controller/del_presupuesto.php?id_cotizacion=" + codigo;
            return true;
        }
    }

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>