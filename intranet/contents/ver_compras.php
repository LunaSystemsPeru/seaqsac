<?php
require '../../models/Compra.php';
require '../../tools/cl_varios.php';
require '../../models/Banco.php';

$c_compra = new Compra();
$c_varios = new cl_varios();
$c_banco = new Banco();

$listaBancos = $c_banco->ver_filas();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Documentos de Compras | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Compras por Periodo</h4>
                                <a href="reg_documento_compra.php" class="btn btn-info"><i class="fa fa-plus"></i>Agregar Documento</a>
                                <button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="10%">Fecha</th>
                                            <th>Documento</th>
                                            <th>Proveedor</th>
                                            <th>Total</th>
                                            <th>Deuda</th>
                                            <th>Estado</th>
                                            <th width="18%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_compras = $c_compra->ver_filas();
                                        foreach ($a_compras as $fila) {
                                            $doc_sunat = $fila['doc_sunat'] . " | " . $fila['serie'] . " - " . $fila['numero'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $c_varios->fecha_mysql_web($fila['fecha'])?></td>
                                                <td class="text-center"><a href="../../archivos/compras/a.pdf" target="_blank" ><?php echo $doc_sunat?></a></td>
                                                <td><?php echo $fila['razon_social']?></td>
                                                <td class="text-right"><?php echo number_format($fila['total'],2)?></td>
                                                <td class="text-right"><?php echo number_format($fila['total'] - $fila['pagado'],2)?></td>
                                                <td><label class="badge badge-warning">Pendiente </label></td>
                                                <td>
                                                    <button onclick="cargarData(<?php echo $fila['id_compras']?>)" data-toggle="modal" data-target="#registroPago" class="btn btn-success btn-icons"><i class="fa fa-dollar"></i></button>
                                                    <button onclick="eliminarCompra(<?php echo $fila['id_compras']?>)" class="btn btn-danger btn-icons"><i class="fa fa-close"></i></button>
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
            <?php include '../fixed/footer.php' ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<div class="modal fade" id="registroPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-4">Pago de Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formhacerpago">
                    <div class="form-group">
                        <input id="idcomprar" type="hidden" name="idcompra" value="">
                        <label for="recipient-name" class="col-form-label">Hacer pago:</label>
                        <div class="col-md-12 row">
                            <label for="recipient-name" class="col-form-label col-md-2">Monto</label>
                            <div class="col-md-3">
                                <input id="montoPago" name="monto" class="form-control">
                            </div>
                            <label for="recipient-name" class="col-form-label col-md-2">Fecha</label>
                            <div class="col-md-5">
                                <input required type="date" id="fechaPago" name="fecha"  class="form-control" value="<?php echo date("Y-m-d");?>">
                            </div>
                        </div>
                        <div class="col-md-12 row" style="margin-top: 5px">
                            <label for="recipient-name" class="col-form-label col-md-2">Banco</label>
                            <div class="col-md-6">
                                <select name="banco" class="form-control" >
                                    <?php foreach ($listaBancos as $item) {

                                        echo "<option value='{$item['id_banco']}'>" . $item['nombre'] . "  S/  " . $item['monto'] . "</option>";
                                    } ?>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4">
                                <button onclick="hacerpago()" type="button" class="btn btn-primary">Pagar</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group" style="background-color: white">
                        <label for="message-text" class="col-form-label">Pagos:</label>
                        <div class="">
                            <div class="">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Banco</th>
                                        <th>Monto</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="contenPagos">

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
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
    var idStado=-1;
    var cambio=false;
    function eliminarCompra(id) {
        $.ajax({
            type: "GET",
            url: "../controller/del_compra.php?id="+id,
            success: function (data) {
                console.log(data);
                if (IsJsonString(data)){
                    location.reload();
                }else{
                    alert("No se puede eliminar la compra");
                }
            }
        });
    }

    function eliminarPagoCompra(idC,idM) {
        $.ajax({
            type: "GET",
            url: "../controller/del_pago_compra.php?idC="+idC+"&idM="+idM,
            success: function (data) {
                console.log(data);
                if (IsJsonString(data)){
                    cargarData(idStado);
                    cambio=true;
                }else{
                    alert("No se puede eliminar el pago");
                }
            }
        });
    }

    function cargarData(id){
        $("#montoPago").val("");
        $("#fechaPago").val("");

        $("#idcomprar").val(id+"");
        idStado=id;
        $.ajax({
            type: "GET",
            url: "../controller/ajax/ver_pagos_compra_sunat.php?id="+id,
            success: function (data) {

                document.getElementById("contenPagos").innerHTML=data;

            }
        });
    }


    function hacerpago(){
        console.log($("#formhacerpago").serialize());
        $.ajax({
            type: "POST",
            url: "../controller/reg_pago_compra.php",
            data: $("#formhacerpago").serialize(),
            success: function (data) {
                console.log(data);
                if (IsJsonString(data)){
                    cargarData(idStado);
                    cambio=true;
                }else{
                    alert("Error al Guardar el pago, o faltan datos");
                }
            }
        });
    }

    $(function () {

        // Initialize Example 1
        $('#tabla').dataTable({
            responsive: true
        });
        $('#registroPago').on('hidden.bs.modal', function () {
            if (cambio){
                location.reload();
            }
        });

    });
    function IsJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }
</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>