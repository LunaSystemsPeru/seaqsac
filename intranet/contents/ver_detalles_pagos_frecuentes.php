<?php
require '../../models/Proveedor.php';
require '../../models/PagoFrecuente.php';
require '../../tools/cl_varios.php';
require  '../../models/Banco.php';
require  '../../models/TipoClasificacion.php';

$c_frecuente = new PagoFrecuente();
$c_proveedor = new Proveedor();
$c_varios=new cl_varios();
$c_banco=new Banco();
$tipoClasificacion=new TipoClasificacion();

$idPago=filter_input(INPUT_GET, 'pago_f');
if (is_null($idPago)){
    header("Location: ver_pagos_frecuentes.php");
}
$c_frecuente->setIdFrecuente($idPago);
$c_frecuente->obtener_datos();
$c_proveedor->setIdProveedor($c_frecuente->getIdProveedor());
$c_proveedor->obtener_datos();

$dias_faltantes=$c_varios->dias_restantes($c_frecuente->getFecha());

$filasPagos=$c_frecuente->ver_filas_pago_movimiento();

$listaBancos=$c_banco->ver_filas();

?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detalle de los Pagos Frecentes | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Detalle de Pago Frecuete</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detalle del Contrato</h4>
                                <div class="add-items d-flex">
                                    <button class="btn btn-behance"><i class="fa fa-edit"></i>Modificar Pago</button>
                                    <button class="btn btn-warning"><i class="fa fa-stop"></i>Detener Frecuencia
                                    </button>
                                </div>
                                <div class="add-items d-flex">
                                    <button class="btn btn-success"><i class="fa fa-sign-out"></i>Pasar a sgt mes
                                    </button>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</button>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Codigo Pago:</label>
                                    <label for=""><?php echo $c_frecuente->getIdFrecuente() ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Proveedor:</label>
                                    <label for=""><?php echo $c_proveedor->getRazonSocial()?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Servicio:</label>
                                    <label for=""><?php echo $c_frecuente->getServicio()?></label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Frecuencia:</label>
                                    <label for=""><?php echo $c_frecuente->getFrecuencia()?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha recordatorio:</label>
                                    <label for=""><?php echo $c_frecuente->getFecha()?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Dias Faltantes:</label>
                                    <label class="<?php echo (($dias_faltantes>=0)?"badge badge-success badge-pill":"badge badge-danger badge-pill")?>" for=""><?php echo $dias_faltantes?> dias</label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Total a Pagar:</label>
                                    <label for=""><?php echo number_format($c_frecuente->getMontoPactado())?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Total Pagado:</label>
                                    <label for=""><?php echo number_format($c_frecuente->getMontoPagado())?></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Estado:</label>
                                    <?php
                                        if ($c_frecuente->getEstado()==1){
                                          echo "<label class='badge badge-success' >Activo</label>";
                                        }elseif($c_frecuente->getEstado()==2){
                                            echo "<label class='badge badge-danger' >Finalizado</label>";
                                        }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ver Pago de este Periodo</h4>
                                <div class="panel-body">
                                    <span data-toggle="modal" data-target="#modal_pago_fre" class="btn btn-behance"><i class="fa fa-plus"></i>Agregar</span>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Banco</th>
                                            <th>Monto</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach ($filasPagos as $item){ ?>
                                        <tr>
                                            <td><?php echo $item["fecha"]?></td>
                                            <td><?php echo $item["banco"]?></td>
                                            <td><?php echo $item["sale"]?></td>
                                            <td><div style="cursor: pointer;" class="badge badge-pill badge-danger"><i class="fa fa-trash"></i></div></td>
                                        </tr>
                                         <?php   }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-bold">Ver Todos los Pagos</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Banco</th>
                                        <th>Monto</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div-->
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

<div class="modal fade" id="modal_pago_fre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-4">Agregar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_modal_pago" action="../controller/reg_frecuencia_movimiento.php" method="post">
                    <input type="hidden" name="id_pago" value="<?php echo $idPago ?>">
                    <div class="form-group">

                        <label for="banco" class="col-form-label">Banco:</label>
                        <select name="id_banco" class="form-control" id="banco">
                            <?php foreach ($listaBancos as $item){

                                echo "<option value='{$item['id_banco']}'>{$item['nombre']}</option>";
                            } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto:</label>
                        <input required type="number" name="monto" class="form-control" id="monto">
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-form-label">Fecha:</label>
                        <input type="date" value="<?php echo date("Y-m-d");?>" name="fecha" class="form-control" id="fecha">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="enviarformularioRegistro()">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


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
    function enviarformularioRegistro(){
        $("#formulario_modal_pago").submit();
    }

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