<?php
session_start();
require '../../models/PlanResiduos.php';
$planResiduos=new PlanResiduos();


$idSucursal= filter_input(INPUT_GET, 'sucursal');
$anio= filter_input(INPUT_GET, 'anio');

$planResiduos->setIdCliente($_SESSION['id_cliente']);
$planResiduos->setAnio($anio);
$planResiduos->setIdSucursal($idSucursal);
$planResiduos->obtener_datos_cliente();

$idPlan=$planResiduos->getIdPlan();

$listaArchivos=[];
$ruta="../../archivos/clientes/pgrs/$idPlan/";

if (is_dir($ruta)){
    $gestor = opendir($ruta);
    while (($archivo = readdir($gestor)) !== false)  {
        if ($archivo != "." && $archivo != ".."){
            $listaArchivos[]=$archivo;
        }

    }
    closedir($gestor);
}



?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Informes de Monitoreos por Cliente | SEAQ SAC - Software de Gestion </title>
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
    <style>
        .click{
            color: white;
            padding: 5px;
            cursor: pointer;
        }
    </style>
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
                                <h4 class="h3">Archivos</h4>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-body">
                                <table style="width:100%">
                                    <tr>
                                        <th>Archivo</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                        foreach ($listaArchivos as $item){  ?>
                                            <tr>
                                                <td><?php echo $item ?></td>
                                                <td><span class="badge badge-primary click" onclick="cargarDocumento('../../archivos/clientes/pgrs/<?php echo $idPlan;?>/<?php echo $item ;?>')">Ver</span></td>
                                            </tr>
                                        <?php      }
                                    ?>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <embed type="application/pdf" id="documento_PDF"  src="../../archivos/clientes/pgrs/<?php echo $idPlan;?>/<?php echo $listaArchivos[0];?>"  width="100%" height="750px" />
                    </div>
                </div>
                <br>


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
<!-- End custom js for this page-->

<script>
    function cargarDocumento(ruta){
        console.log(ruta)
        $("#documento_PDF").prop("src",ruta);
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