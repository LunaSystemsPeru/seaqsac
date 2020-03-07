<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
require  'cabeza.php';
require  '../../models/PlanResiduos.php';
require  '../../models/Cliente.php';

$planResiduos=new PlanResiduos();
$c_cliente = new Cliente();

$listacls=$planResiduos->ver_filas();
$listaClientes=$c_cliente->ver_clientes();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Plan de Residuos Solidos | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="../../vendors/jquery.uploadfile/uploadfile.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../vendors/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../vendors/assets/images/favicon.png"/>
    <link href="../../vendors/select2/css/select2.css" rel="stylesheet" />

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
                                <h4 class="h3">Relacion de clientes - Residuos Solidos</h4>
                                <button class="btn btn-info" data-target="#modalcrear" data-toggle="modal"><i class="fa fa-plus"></i>Agregar</button>
                            </div>

                            <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form class="forms-sample" method="post" action="../controller/reg_plan_residuos.php">
                                            <div class="color-line"></div>
                                            <div class="modal-header text-center">
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Cliente</label>
                                                    <select  id="selectCliente" class="form-control" name="selectCliente">
                                                        <?php  foreach ($listaClientes as $item){
                                                            echo "<option value='{$item['id_clientes']}'>{$item['ruc']} - {$item['razon_social']}</option>";
                                                        } ?>
                                                        <option value=''></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Sucursal</label>
                                                    <select  class="form-control" id="select_sucursal" name="select_sucursal">

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Año</label>
                                                    <input required type="text" class="form-control"  id="input_anio" name="input_anio">
                                                </div>
                                                <!--div class="form-group">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Jquery file upload</h4>
                                                            <div class="file-upload-wrapper">
                                                                <div id="fileuploader"><div class="ajax-upload-dragdrop" style="vertical-align: top; width: 400px;"><div class="ajax-file-upload" style="position: relative; overflow: hidden; cursor: default;">Upload<form method="POST" action="YOUR_FILE_UPLOAD_URL" enctype="multipart/form-data" style="margin: 0px; padding: 0px;"><input type="file" id="ajax-upload-id-1583530679766" name="myfile[]" accept="*" multiple="" style="position: absolute; cursor: pointer; top: 0px; width: 100%; height: 100%; left: 0px; z-index: 100; opacity: 0;"></form></div><span><b>Drag &amp; Drop Files</b></span></div><div></div></div><div class="ajax-file-upload-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div-->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar y Continuar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Año</th>
                                            <th>RUC</th>
                                            <th>Razon Social</th>
                                            <th>Sucursal</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($listacls as $item){ ?>
                                            <tr>
                                                <td><?php echo $item['id_plan']?></td>
                                                <td><?php echo $item['anio']?></td>
                                                <td><?php echo $item['ruc']?></td>
                                                <td><?php echo $item['razon_social']?></td>
                                                <td><?php echo $item['nombre']?></td>
                                                <td>
                                                    <a href="ver_archivos_plan_residuos.php?plan=<?php echo $item['id_plan']?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        <?php    }

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
<script src="../../vendors/jquery.uploadfile/jquery.uploadfile.min.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../vendors/assets/js/dashboard.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../vendors/select2/js/select2.js"></script>



<!-- End custom js for this page-->

<script>

    function selectChCliente(idCliente){
        $.ajax({
            type: "GET",
            url: "../controller/ajax/ver_sucursales.php?id_cliente="+idCliente,
            success: function (data) {
                console.log(data);
                document.getElementById('select_sucursal').innerHTML=data;
            }
        });
    }


    $(document).ready(function () {
        selectChCliente($("#selectCliente option:selected").val())

        $('#selectCliente').on('change', function() {
             var idCliente=this.value;
            selectChCliente(idCliente);
        });

    });





</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>