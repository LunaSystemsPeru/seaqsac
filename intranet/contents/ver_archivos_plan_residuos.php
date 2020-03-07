<?php
require 'cabeza.php';
require '../../models/PlanResiduos.php';
require '../../models/ClienteSucursal.php';
require '../../models/Cliente.php';

$planResiduos = new PlanResiduos();
$sucursal = new ClienteSucursal();
$cliente = new Cliente();

if (filter_input(INPUT_GET, 'plan')) {
    $planResiduos->setIdPlan(filter_input(INPUT_GET, 'plan'));
    $planResiduos->obtener_datos();

    $cliente->setIdCliente($planResiduos->getIdCliente());
    $cliente->obtener_datos();

    $sucursal->setIdCliente($planResiduos->getIdCliente());
    $sucursal->setIdSucursal($planResiduos->getIdSucursal());
    $sucursal->obtener_datos();
} else {
    header("Location: ver_plan_residuos.php");
}

?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Plan de Residuos por Cliente - Sucursal | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="../../vendors/dropzone/dropzone.css">
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
    <link href="../../vendors/select2/css/select2.css" rel="stylesheet"/>

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
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <h3>Archivos de Plan de Residuos Solidos</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="col-form-label"> Cliente : <?php echo $cliente->getRazonSocial() ?></label>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"> Sucursal : <?php echo $sucursal->getNombre() . " - " . $sucursal->getDireccion() ?></label>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"> Año : <?php echo $planResiduos->getAnio() ?></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br/>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal_upload"><i class="fa fa-plus"></i> agregar archivos</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Archivo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $directorio = '../../archivos/clientes/pgrs/' . $planResiduos->getIdPlan() . "/";
                                //if (file_exists($directorio)) {
                                    $dir = opendir($directorio);
                                    // Leo todos los ficheros de la carpeta
                                    while ($elemento = readdir($dir)) {
                                        // Tratamos los elementos . y .. que tienen todas las carpetas
                                        if ($elemento != "." && $elemento != "..") {
                                            // Si es una carpeta
                                            if (is_dir($directorio . $elemento)) {
                                                // Muestro la carpeta
                                                //echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
                                                // Si es un fichero
                                            } else {
                                                // Muestro el fichero
                                                ?>
                                                <tr>
                                                    <td><?php echo $elemento ?></td>
                                                    <td class="text-center">
                                                        <button onclick="eliminar('<?php echo $planResiduos->getIdPlan()?>', '<?php echo $elemento ?>')" class="btn btn-icons btn-danger" title="Eliminar Pago"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                               // }
                                ?>
                                </tbody>
                            </table>
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

    <div class="modal fade" id="modal_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Contrato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="card-title">Dropzone</h4>
                    <form action="../controller/ajax/guardar_archivos.php?id_plan=<?php echo $planResiduos->getIdPlan()?>" class="dropzone" id="my-awesome-dropzone">
                    </form>
                </div>
                <div class="modal-footer">
                    <button onclick="actualizar()" class="btn btn-success">Actualizar</button>
                    <!--<button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>-->
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
    <script src="../../vendors/dropzone/dropzone.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../vendors/assets/js/dashboard.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- End custom js for this page-->

    <script>
        function actualizar () {
            location.reload();
        }

        function eliminar(id_plam, archivo) {
            $.ajax({
                data: {"id_plan": id_plam, "archivo" : archivo},
                url: '../controller/ajax/eliminar_apgrs.php',
                type: 'post',
                beforeSend: function () {
                    console.log("espera");
                },
                success: function (response) {
                    console.log(response);
                    location.reload();
                },
                error: function () {
                    console.log("error");
                }
            });
        }
        //Dropzone.autoDiscover = false;
        /*jQuery(document).ready(function() {
            $("div#my-awesome-dropzone").Dropzone({
                url: "../controller/ajax/guardar_archivos.php"
            });
        });*/


    </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>