<?php
session_start();
require '../../models/Monitoreo.php';
require '../../models/MonitoreoComentario.php';
require '../../models/MonitoreoAnexo.php';
require '../../models/Cliente.php';
require '../../models/ClienteSucursal.php';
require '../../models/TipoClasificacion.php';
require '../../models/TipoSubClase.php';
require '../../models/Equipo.php';
require '../../models/MonitoreoEquipo.php';
$c_monitoreo = new Monitoreo();
$c_monitoreo->setIdMonitoreo(filter_input(INPUT_GET, 'monitoreio'));

$c_monitoreo->obtener_datos();


$c_comentario = new MonitoreoComentario();
$c_comentario->setIdMonitoreo($c_monitoreo->getIdMonitoreo());


$c_anexo = new MonitoreoAnexo();
$c_anexo->setIdMonitoreo($c_monitoreo->getIdMonitoreo());


$c_cliente = new Cliente();
$c_cliente->setIdCliente($c_monitoreo->getIdCliente());
$c_cliente->obtener_datos();


$c_sucursal = new ClienteSucursal();
$c_sucursal->setIdCliente($c_monitoreo->getIdCliente());
$c_sucursal->setIdSucursal($c_monitoreo->getIdSucursal());
$c_sucursal->obtener_datos();

$c_clase = new TipoSubClase();
$c_clase->setIdClase($c_monitoreo->getIdClase());
$c_clase->obtener_datos();


$c_tipo = new TipoClasificacion();
$c_tipo->setId($c_clase->getIdTipo());
$c_tipo->obtener_datos();

$c_equipos = new Equipo();

$c_mequipos = new MonitoreoEquipo();
$c_mequipos->setIdMonitoreo($c_monitoreo->getIdMonitoreo());
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
                                <h4 class="h3">Datos del informe</h4>
                                <!--button class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>Buscar por Criterios
                                </button-->
                            </div>


                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="card">

                            <?php
                            if ($c_monitoreo->getestado() == 1) {
                                $valor_estado = '<label class="badge badge-warning">Pendiente</label>';
                            }
                            $url_informe = "../../archivos/clientes/monitoreos/" . $c_monitoreo->getIdCliente() . "/" . $c_monitoreo->getIdSucursal() . "/" . $c_monitoreo->getUrlInforme();
                            $temporary = explode(".", $c_monitoreo->getUrlInforme());
                            $file_extension = end($temporary);
                            $nombre_archivo = $c_cliente->getRazonSocial() . " - " . $c_sucursal->getNombre() . " - " . $c_tipo->getNombre() . " - " . $c_clase->getNombre() . "." . $file_extension;
                            ?>
                            <div class="card-body">
                                <p><span class="font-weight-bold">cliente =</span> <?php echo $c_cliente->getRazonSocial() ?></p>
                                <p><span class="font-weight-bold">ubicacion =</span> <?php echo $c_sucursal->getNombre() ?></p>
                                <p><span class="font-weight-bold">direccion =</span> <?php echo $c_sucursal->getDireccion() ?></p>
                                <p><span class="font-weight-bold">fecha =</span> <?php echo $c_monitoreo->getfecha() ?></p>
                                <p><span class="font-weight-bold">tipo =</span> <?php echo $c_tipo->getNombre() . " - " . $c_clase->getNombre() ?></p>

                                <p><span class="font-weight-bold">estado =</span> <?php echo $valor_estado ?></p>
                                <span class="badge badge-primary click"  onclick="cargarDocumento('<?php echo '../../archivos/clientes/monitoreos/' . $_SESSION['id_cliente'] . '/' . $c_monitoreo->getIdSucursal() . '/'. $c_monitoreo->getUrlInforme()?>' )">Ver Informe</span>
                                <span class="badge badge-info click" >Ver Revisiones</span>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                            <div class="table-responsive">
                                <h4>Equipos de medicion</h4>
                                <table id="tabla_equipos" class="table table-striped">
                                    <tbody>
                                    <?php
                                    $a_mequipos = $c_mequipos->ver_filas();
                                    foreach ($a_mequipos as $fila) {
                                        $mequipo = $fila['nombre'] . " " . $fila['marca'] . " " . $fila['modelo'] . " " . $fila['serie'];
                                        ?>
                                        <tr>
                                            <td>
                                                <span style="cursor: pointer;color: #0b63b1"  onclick="cargarDocumento('../../archivos/equipos/<?php echo $fila["certificado"]?>')" target="_blank"><?php echo $mequipo?></span>
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
                    <div class="col-md-8">
                        <embed id="documento_PDF" type="application/pdf"  src="<?php echo '../../archivos/clientes/monitoreos/' . $_SESSION['id_cliente'] . '/' . $c_monitoreo->getIdSucursal() . '/'. $c_monitoreo->getUrlInforme()?>"  width="100%" height="750px" />
                    </div>
                </div>
                <br>
                <div class="row" >
                    <div class="card" style="width: 100%; padding: 15px;">
                        <h4 class="h3">Archivos / Anexos / Ensayos</h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabla_anexo" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Descripcion</th>
                                        <th>Fecha</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $a_anexos = $c_anexo->ver_filas();
                                    foreach ($a_anexos as $fila) {
                                        $archivo = "../../archivos/clientes/monitoreos/" . $fila['id_clientes'] . "/" . $fila['id_sucursal'] . "/" . $fila['archivo'];
                                        ?>
                                        <tr>
                                            <td> <span class="btn btn-info" onclick="cargarDocumento('<?php echo $archivo;?>')"><i  class="fa fa-search"></i> </span>  <?php echo $fila['descripcion'] ?></td>
                                            <td><?php echo $fila['fecha'] ?></td>

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