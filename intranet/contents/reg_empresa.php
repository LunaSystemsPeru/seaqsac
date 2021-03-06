<?php
include 'cabeza.php';
require '../../models/Empresa.php';

$c_empresa = new Empresa();

if (filter_input(INPUT_GET, 'id')) {
    $c_empresa->setIdEmpresa(filter_input(INPUT_GET, 'id'));
    $c_empresa->obtener_datos();
}


?>
<!DOCTYPE html>
<html lang="es">


    <!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Agregar Empresa | SEAQ SAC - Software de Gestion </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../../vendors/assets/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../../vendors/assets/images/favicon.png" />
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
                                    <form class="form-sample" method="post" action="../controller/reg_empresa.php">
                                        <div class="card-header">
                                            <h4 class="h3">Agregar Empresa</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">RUC</label>
                                                <div class="input-group col-sm-5">
                                                    <input type="text" class="form-control text-center" placeholder="Ingrese RUC" id="input_ruc" name="input_ruc" value="<?php echo $c_empresa->getRuc()?>" maxlength="11" />
                                                    <span class="input-group-append">
                                                        <button class="btn btn-info" type="button" onclick="enviar_ruc()">
                                                            <i class="fa fa-search"></i> Validar RUC
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Razon Social</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_razon_social" name="input_razon_social" value="<?php echo $c_empresa->getRazonSocial()?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nombre Comercial</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nombre_comercial" name="input_nombre_comercial" value="<?php echo $c_empresa->getComercial()?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Direccion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_direccion" name="input_direccion" value="<?php echo $c_empresa->getDireccion()?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Condicion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_condicion" name="input_condicion" value="<?php echo $c_empresa->getCondicion()?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Estado</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_estado" name="input_estado" value="<?php echo $c_empresa->getEstado()?>"/>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tipo</label>
                                                <div class="col-sm-4">
                                                    <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="radio_tipo" id="radio_tipo1" value="1" checked> Propio
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="radio_tipo" id="radio_tipo2" value="2"> Tercero
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <input type="hidden" name="hidden_id_cliente" value="<?php echo $c_empresa->getIdEmpresa()?>">
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

                // Initialize Example 1
                $('#tabla').dataTable({
                    responsive: true
                });

            });

        </script>
        <script>

            function cargar_empresas(tipo) {
                $.ajax({
                    data: {"input_tipo": tipo},
                    url: '../../data/ajax/ver_empresas_tipo.php',
                    type: 'post',
                    beforeSend: function () {
                        $("#select_empresa").prop("disabled", true);
                    },
                    success: function (response) {
                        console.log(response);
                        $("#select_empresa").prop("disabled", false);
                        $("#select_empresa").find('option').remove();
                        var json = JSON.parse(response);
                        $(json.data).each(function (key, registro) {
                            console.log(registro);
                            $("#select_empresa").append('<option value="' + registro.id_empresas + '">' + registro.razon_social + '</option>');
                        });
                    },
                    error: function () {
                        $("#select_empresa").prop("disabled", true);
                    }
                });
            }

            function selectArchivo() {
                $('#file').trigger('click');
            }

        </script>
    </body>


    <!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>