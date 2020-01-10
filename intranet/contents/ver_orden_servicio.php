<?php
require '../../models/OrdenServicio.php';
$c_orden = new OrdenServicio();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Ordenes de Servicio | Cotizaciones | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Ordenes de Servicios - Clientes</h4>
                                <a href="reg_presupuesto.php" class="btn btn-info"><i class="fa fa-plus"></i>Agregar Documento</a>
                                <button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Descripcion</th>
                                            <th>Cliente</th>
                                            <th width="13%">Fecha</th>
                                            <th>Total</th>
                                            <th>Facturado</th>
                                            <th width="13%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_ordenes = $c_orden->ver_filas();
                                        foreach ($a_ordenes as $fila) {
                                            $monto_total = $fila['total'];
                                            $total_facturado = $fila['total_facturado'];
                                            $porcentaje = $total_facturado / $monto_total;
                                            ?>
                                            <tr>
                                                <td><?php echo $fila['numero_orden']?></td>
                                                <td><?php echo $fila['descripcion']?></td>
                                                <td><?php echo $fila['razon_social']?></td>
                                                <td class="text-center"><?php echo $fila['fecha']?></td>
                                                <td class="text-right"><?php echo $fila['total']?></td>
                                                <td class="text-center">
                                                    <span class="btn btn-warning btn-icons"><?php echo $porcentaje?>% </span>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-info btn-icons" title="Ver Facturas Asociadas a la Orden" onclick="obtener_modal('<?php echo $fila['id_orden_cliente']?>')"><i class="fa fa-dollar"></i></button>
                                                    <button class="btn btn-danger btn-icons" title="Eliminar Orden de Servicio" onclick="eliminar('<?php echo $fila['id_orden_cliente']?>')"><i class="fa fa-close"></i></button>
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
                            <div class="color-line"></div>
                            <div class="modal-header text-center">
                                <h4 class="modal-title">Agregar Archivo - Anexo</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputName1">Fecha</label>
                                    <div class="input-group col-xs-12">
                                        <input type="date" class="form-control" id="input_fecha" name="input_fecha" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Descripcion: </label>
                                    <input type="text" class="form-control" id="input_descripcion" name="input_descripcion" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Archivo: </label>
                                    <input type="file" class="form-control" id="input_archivo" name="input_archivo" accept="application/pdf" required>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3145728"/>
                                </div>

                                <div class="table-responsive1">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="13%">Documento</th>
                                            <th>Fecha</th>
                                            <th>Cliente</th>
                                            <th>Total</th>
                                            <th>Pagado</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>FT | F001 - 012365</td>
                                                <td>12/07/2019</td>
                                                <td>CONMETAL Y SERVICIOS EIRL</td>
                                                <td class="text-right">1,650.00</td>
                                                <td class="text-right">1,650.00</td>
                                                <td><label class="badge badge-success badge-lg">Pagado</label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
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

    function obtener_modal(id_orden) {
     /*   var parametros = {
            "id_cotizacion": id_cotizacion
        };
        $.ajax({
            data: parametros,
            url: 'peticiones_modal/m_aprobar_cotizacion.php',
            type: 'post',
            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                $("#resultado").html(response);
                $("#modalcrear").modal("toggle");
            }
        });
        */
        $("#modalcrear").modal("toggle");
    }

    function eliminar(codigo) {
        if (!confirm("¿Está seguro de que desea eliminar la Orden de Servicio Seleccionada?")) {
            return false;
        }
        else {
            document.location = "procesos/del_orden_servicio.php?id_orden=" + codigo;
            return true;
        }
    }
</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>