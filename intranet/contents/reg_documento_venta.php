<?php
require '../../models/Cliente.php';
$c_cliente = new Cliente();
?>

<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agregar Documento de Venta | SEAQ SAC - Software de Gestion </title>
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
                            <form class="form-sample" enctype="multipart/form-data" method="post" action="../controller/reg_venta.php">
                                <div class="card-header">
                                    <h4 class="h3">Agregar Documento de Venta</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Tipo Documento</label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="select_documento" id="select_documento">
                                                <option value="1">FACTURA</option>
                                                <option value="2">BOLETA</option>
                                            </select>
                                        </div>
                                        <label class="col-md-2 col-form-label">Fecha</label>
                                        <div class="col-md-3">
                                            <input type="date" class="form-control" name="input_fecha" id="input_fecha"
                                                   value="<?php echo date("Y-m-d") ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Serie</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control text-center" name="input_serie"
                                                   id="input_serie" maxlength="4" value="E001" required/>
                                        </div>
                                        <label class="col-md-2 col-form-label">Numero</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control  text-center" name="input_numero"
                                                   id="input_numero" maxlength="7" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Cliente:</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="select_cliente" id="select_cliente">
                                                <?php
                                                $resultado = $c_cliente->ver_clientes();
                                                while ($row = $resultado->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row['id_clientes'] ?>"><?php echo $row['razon_social'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="reg_cliente.php" class="btn btn-success" name="btn_crear_cliente"
                                               id="btn_crear_cliente" target="_blank"><i class="fa fa-plus"></i>
                                                Nuevo</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Orden Interna</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="select_orden_interna" id="select_orden_interna">
                                                    <option value="0">SIN ORDEN INTERNA</option>
                                            </select>
                                        </div>
                                        <label class="col-md-2 col-form-label">Orden de Servicio</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="select_orden_servicio" id="select_orden_servicio">
                                                onchange="ver_datos_orden()">
                                                <option value="0">SIN ORDEN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Moneda</label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="select_moneda" id="select_moneda"
                                                    onchange="validar_moneda()">
                                                <option value="1">SOL</option>
                                                <option value="2">DOLAR</option>
                                            </select>
                                            <input type="hidden" id="hidden_tc"/>
                                        </div>
                                        <label class="col-md-1 col-form-label">TC sunat</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control text-right" name="input_tc"
                                                   id="input_tc" maxlength="5" value="1.000" required/>
                                        </div>
                                        <label class="col-md-2 col-form-label">Porcentaje O.S.</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control text-center" name="input_porcentaje"
                                                   id="input_porcentaje" onkeyup="facturado()" maxlength="8" value="100"
                                                   required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Sub Total</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control text-right" placeholder="0.00"
                                                   onkeyup="calcular_total()" name="input_subtotal" id="input_subtotal"
                                                   required/>
                                        </div>
                                        <label class="col-md-1 col-form-label">IGV</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control text-right" placeholder="0.00"
                                                   name="input_igv" id="input_igv" required/>
                                        </div>
                                        <label class="col-md-1 col-form-label">Total</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control text-right" placeholder="0.00"
                                                   name="input_total" id="input_total" required readonly="true"/>
                                            <input type="hidden" name="hidden_total" id="hidden_total"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Arjuntar Archivo:</label>
                                        <div class="col-md-10">
                                            <input type="file" class="form-control" name="input_file" accept="application/pdf" required/>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="3145728"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
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
<script src="../../vendors/assets/js/funciones_basicas.js"></script>
<!-- End custom js for this page-->

<script>

    $(function () {
        obtener_tc();
        // Initialize Example 1
        $('#tabla').dataTable({
            responsive: true
        });

    });

</script>

</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>