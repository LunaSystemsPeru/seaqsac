<?php
require '../../models/Venta.php';
require '../../models/Banco.php';
require '../../models/Cliente.php';
require '../../models/OrdenServicio.php';
require '../../models/DocumentoSunat.php';
require '../../models/VentasCobro.php';

$banco=new Banco();
$venta=new Venta();
$cliente=new Cliente();
$ordenServicio=new OrdenServicio();
$documentoSunat=new DocumentoSunat();
$ventasCobro=new VentasCobro();


$idventa=filter_input(INPUT_GET, 'venta');
if (!isset($idventa)){
    header("Location: ver_ventas.php");
}

$venta->setIdVenta($idventa);
$venta->obtener_datos();

$cliente->setIdCliente($venta->getIdCliente());
$cliente->obtener_datos();

$ordenServicio->setIdOrden($venta->getIdOrdenInterna());
$ordenServicio->obtener_datos();

$documentoSunat->setIdTido($venta->getIdDocumento());
$documentoSunat->obtener_datos();

$listaBanco=$banco->ver_filas();

$ventasCobro->setIdVentas($idventa);
$listaCobros=$ventasCobro->verFilas();

?>
<!DOCTYPE html>
<html lang="es">


    <!-- mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by httrack website copier/3.x [xr&co'2014], mon, 29 apr 2019 14:35:52 gmt -->
    <head>
        <!-- required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Cobranza de Documentos de Venta | seaq sac - software de gestion </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.min.css"/>
        <!-- plugin css for this page -->
        <!-- end plugin css for this page -->
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
                            <div class="col-lg-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="h3">Documento de Venta</h4>
                                    </div>
                                    <div class="card-body">
                                        <p><span class="font-weight-bold">cliente: </span><?php echo $cliente->getRazonSocial() ?></p>
                                        <p><span class="font-weight-bold">fecha: </span><?php echo $venta->getFecha() ?></p>
                                        <p><span class="font-weight-bold">Orden Interna: </span><?php echo $venta->getIdOrdenInterna() ?></p>
                                        <p><span class="font-weight-bold">Orden de Servicio: </span><?php echo $ordenServicio->getDescripcion() ?></p>
                                        <p><span class="font-weight-bold">Total: </span><?php echo $venta->getTotal() ?></p>
                                        <p><span class="font-weight-bold">Pagado: </span><?php echo $venta->getPagado() ?></p>
                                        <p><span class="font-weight-bold">Archivo </span> <a href="../../archivos/ventas/<?php echo $venta->getArchivo() ?>" download="nombre_archivo.pdf" title="nombre_archivo"><i class="fa fa-download"></i> Descargar</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="h3">Pagos del Documento </span><?php echo $documentoSunat->getAbreviado()." - {$venta->getSerie()} - {$venta->getNumero()}"?></h4>
                                        <button  class="btn btn-info" data-toggle="modal" data-target="#modalcrear"><i class="fa fa-user-plus"></i>agregar cobro</button>
                                        <a href="ver_ventas.php" class="btn btn-outline-success">
                                            <i class="fa fa-arrow-left"></i>Regresar a Ventas
                                        </a>

                                        <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="forms-sample" method="post" action="../controller/reg_pago_venta.php">
                                                        <input type="hidden" name="id_venta" value="<?php echo $idventa ?>">
                                                        <div class="color-line"></div>
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title">Agregar Cobro de Documento</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Banco</label>
                                                                <div class="input-group col-xs-12">
                                                                    <select class="form-control" name="select_banco" id="select_banco">
                                                                        <?php foreach ($listaBanco as $item){
                                                                            echo "<option value='{$item['id_banco']}'>{$item['nombre']}  S/. {$item['monto']}</option>";
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Fecha: </label>
                                                                <input type="date" class="form-control" name="input_fecha" id="input_fecha" value="<?php echo date("Y-m-d");?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Monto Total: </label>
                                                                <input type="text" value="<?php echo $venta->getTotal() ?>" class="form-control" name="input_total" id="input_total" readonly>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label for="exampleInputName1">Porcentaje: </label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-radio">
                                                                        <label class="form-check-label">
                                                                            <input onclick="calcular(9)" type="radio" class="form-check-input" name="radio_porcentaje" id="radio_9" value="9" checked > 9 %
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-radio">
                                                                        <label class="form-check-label">
                                                                            <input onclick="calcular(91)" type="radio" class="form-check-input" name="radio_porcentaje" id="radio_91" value="81" > 91 %
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Monto a Cobrar: </label>
                                                                <input  type="text" class="form-control" name="input_cobro" id="input_cobro" required>
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
                                    </div>
                                    <div class="card-body">
                                        <table id="tabla" class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Banco</th>
                                                <th>Porcentaje</th>
                                                <th>Monto</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                             foreach ($listaCobros as $item){ ?>
                                                 <tr>
                                                     <td><?php echo $item['fecha'] ?></td>
                                                     <td><?php echo $item['nombre'] ?></td>
                                                     <td class="text-center"><?php echo  ceil(($item['ingresa']*100)/$venta->getTotal())."%" ?></td>
                                                     <td class="text-right"><?php echo number_format($item['ingresa'], 2) ?></td>
                                                     <td class="text-center">
                                                         <button onclick="eliminar(<?php echo  $item['id_movimiento'] .",".$idventa ?>)" class="btn btn-danger btn-icons"><i class="fa fa-close"></i></button>
                                                     </td>
                                                 </tr>
                                             <?php } ?>

                                            </tbody>
                                        </table>
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
        <!-- plugin js for this page-->
        <!-- end plugin js for this page-->
        <!-- inject:js -->
        <script src="../../vendors/assets/js/off-canvas.js"></script>
        <script src="../../vendors/assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- custom js for this page-->
        <script src="../../vendors/assets/js/dashboard.js"></script>
        <!-- end custom js for this page-->

        <script>
            var monto=<?php echo $venta->getTotal() ?>;
            $(function () {
                calcular(9);
            });

            function eliminar(idM,idV) {
                $.ajax({
                    type: "GET",
                    url: "../controller/del_pago_venta.php?idV="+idV+"&idM="+idM,
                    success: function (data) {
                        console.log(data);
                       if (IsJsonString(data)){
                           location.reload();
                       } else{
                           alert("No de pudo eliminar est cobro");
                       }
                    }
                });
            }
            function IsJsonString(str) {
                try {
                    JSON.parse(str);
                } catch (e) {
                    return false;
                }
                return true;
            }

            function calcular(ps){
                var porecentaje=parseFloat((monto*ps)/100).toFixed(2);
                $("#input_cobro").val(porecentaje);
            }
        </script>
    </body>


    <!-- mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by httrack website copier/3.x [xr&co'2014], mon, 29 apr 2019 14:36:03 gmt -->
</html>
