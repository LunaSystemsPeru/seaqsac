<?php
require 'clases/Cliente.php';
$c_cliente = new Cliente();

require 'clases/TipoClasificacion.php';
$c_tipo = new TipoClasificacion();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrar Informe de Auditoria | SEAQ SAC - Software de Gestion </title>
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
                            <form class="form-sample" method="post" action="procesos/reg_auditoria.php">
                                <div class="card-header">
                                    <h4 class="h3">Agregar Informe de Auditoria</h4>
                                </div>
                                <div class="card-body">


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Fecha</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="input_fecha" id="input_fecha" value="<?php echo date("Y-m-d") ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cliente</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_cliente" name="select_cliente" onchange="cargar_sucursales()">
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
                                        <div class="col-sm-1">
                                            <a href="reg_cliente.php" class="btn btn-info"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Ubicacion</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_sucursal" name="select_sucursal">
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <button class="btn btn-info"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Norma</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="select_tipo" name="select_tipo" >
                                                <?php
                                                $c_tipo->setCodigo(3);
                                                $resultado = $c_tipo->ver_tipos_codigo();
                                                while ($row = $resultado->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row['id_tipo'] ?>"><?php echo $row['nombre'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Auditor</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="input_auditor" id="input_auditor" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Auditado</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="input_auditado" id="input_auditado" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alcance</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="input_alcance" id="input_alcance" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">URL Archivo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="input_url"/>
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
        cargar_clase();
        cargar_sucursales();

    });



</script>
<script>
    function cargar_sucursales() {
        var ssucursal = $("#select_sucursal");
        var scliente = $("#select_cliente");
        var id_cliente = scliente.val();
        $.ajax({
            data: {"id_cliente": id_cliente},
            url: 'peticiones_post_json/ver_sucursales_cliente.php',
            type: 'post',
            beforeSend: function () {
                ssucursal.prop("disabled", true);
            },
            success: function (response) {
                ssucursal.prop("disabled", false);
                ssucursal.find('option').remove();
                var json = JSON.parse(response);
                $(json.data).each(function (key, registro) {
                    ssucursal.append('<option value="' + registro.id_sucursal + '">' + registro.nombre + '</option>');
                });
            },
            error: function () {
                ssucursal.prop("disabled", true);
            }
        });
    }
</script>

<script>
    function cargar_clase() {
        var stipo = $("#select_tipo");
        var sclase = $("#select_clase");
        var id_tipo = stipo.val();
        $.ajax({
            data: {
                "id_tipo": id_tipo
            },
            url: 'peticiones_post_json/ver_clases_tipo.php',
            type: 'post',
            beforeSend: function () {
                sclase.prop("disabled", true);
            },
            success: function (response) {
                sclase.prop("disabled", false);
                sclase.find('option').remove();
                var json = JSON.parse(response);
                $(json.data).each(function (key, registro) {
                    sclase.append('<option value="' + registro.id_subclase + '">' + registro.nombre + '</option>');
                });
            },
            error: function () {
                sclase.prop("disabled", true);
            }
        });
    }
</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>