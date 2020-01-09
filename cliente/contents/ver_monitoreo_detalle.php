<?php
$id_monitoreo = filter_var(filter_input(INPUT_GET, 'id_monitoreo'), FILTER_SANITIZE_NUMBER_INT);

require 'clases/cl_monitoreo.php';
$c_monitoreo = new cl_monitoreo();
$c_monitoreo->setIdMonitoreo($id_monitoreo);
$c_monitoreo->obtener_datos();

require 'clases/cl_monitoreo_comentarios.php';
$c_comentario = new cl_monitoreo_comentarios();
$c_comentario->setIdMonitoreo($c_monitoreo->getIdMonitoreo());

require 'clases/cl_cliente.php';
$c_cliente = new cl_cliente();
$c_cliente->setIdCliente($c_monitoreo->getIdCliente());
$c_cliente->obtener_datos();

require 'clases/cl_cliente_sucursal.php';
$c_sucursal = new cl_cliente_sucursal();
$c_sucursal->setIdCliente($c_monitoreo->getIdCliente());
$c_sucursal->setIdSucursal($c_monitoreo->getIdSucursal());
$c_sucursal->obtener_datos();

require 'clases/cl_tipos.php';
$c_tipo = new cl_tipos();
$c_tipo->setId($c_monitoreo->getIdTipo());
$c_tipo->obtener_datos();

require 'clases/cl_tipo_subclase.php';
$c_clase = new cl_tipo_subclase();
$c_clase->setIdTipo($c_monitoreo->getIdTipo());
$c_clase->setIdClase($c_monitoreo->getIdClase());
$c_clase->obtener_datos();
?>
<!DOCTYPE html>
<html lang="es">


<!-- mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by httrack website copier/3.x [xr&co'2014], mon, 29 apr 2019 14:35:52 gmt -->
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>estado del informe de monitoreo | seaq sac - software de gestion </title>
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
    <link rel="stylesheet" href="../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png"/>
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include 'fixed/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include 'fixed/sidebar.php' ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">datos del informe</h4>
                            </div>
                            <?php
                            if ($c_monitoreo->getestado() == 1) {
                                $valor_estado = '<label class="badge badge-warning">Pendiente</label>';
                            }
                            $url_informe = "../intranet/archivos_cliente/monitoreos/" . $c_monitoreo->getIdCliente() . "/" . $c_monitoreo->getIdSucursal() . "/" . $c_monitoreo->getUrlInforme();
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
                                <p><span class="font-weight-bold">fecha revision =</span> <?php echo $c_monitoreo->getfecharevision() ?></p>
                                <p><span class="font-weight-bold">estado =</span> <?php echo $valor_estado ?></p>
                                <p><span class="font-weight-bold">Archivo </span> <a href="<?php echo $url_informe ?>" download="<?php echo $nombre_archivo ?>" title="<?php echo $nombre_archivo ?>"><i class="fa fa-download"></i> Descargar</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">revision del informe </span> <?php echo $c_tipo->getNombre() . " - " . $c_clase->getNombre() ?></h4>
                                <button class="btn btn-info" data-toggle="modal" data-target="#modalcrear"><i class="fa fa-user-plus"></i>agregar respuesta</button>
                                <a href="ver_informe_monitoreos.php" class="btn btn-outline-success">
                                    <i class="fa fa-arrow-left"></i>Ver Monitoreos
                                </a>

                                <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="forms-sample" method="post" action="../controller/reg_monitoreo_comentario.php">
                                                <div class="color-line"></div>
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title">Agregar Comentario</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Autor</label>
                                                        <div class="input-group col-xs-12">
                                                            <input type="text" class="form-control" id="input_autor" name="input_autor" maxlength="45" value="<?php echo  $_SESSION['contacto']?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Titulo: </label>
                                                        <input type="text" class="form-control" id="input_titulo" name="input_titulo" >
                                                        <input type="hidden" id="hidden_id_monitoreo" name="hidden_id_monitoreo" value="<?php echo $c_monitoreo->getIdMonitoreo() ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Mensaje: </label>
                                                        <textarea class="form-control" id="input_mensaje" name="input_mensaje" rows="6"></textarea>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="exampleInputName1">Accion: </label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="radio_tipo" id="radio_tipo1" value="1" checked > Corregir
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="radio_tipo" id="radio_tipo2" value="2" > Aprobar
                                                                </label>
                                                            </div>
                                                        </div>
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
                                <div class="fluid-container">
                                    <?php
                                    $resultados = $c_comentario->ver_comentarios();
                                    while ($row = $resultados->fetch_assoc()) {
                                        $tipo = $row['tipo'];
                                        if ($tipo == 1) {
                                            $empresa = $c_cliente->getRazonSocial();
                                            $face = $c_cliente->getLogo();
                                        } else {
                                            $empresa = "SEAQ SAC";
                                            $face = 'logo_seaq.png';
                                        }
                                        ?>
                                        <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                                            <div class="col-md-1">
                                                <img class="img-sm rounded-circle mb-4 mb-md-0" src="../intranet/archivos_cliente/logos/<?php echo $face?>" alt="profile image">
                                            </div>
                                            <div class="ticket-details col-md-11">
                                                <div class="d-flex">
                                                    <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap"><?php echo $empresa?>:</p>
                                                    <p class="text-primary mr-1 mb-0">[<?php echo $row['id_monitoreos'] . "-" . $row['id_comentario']?>]</p>
                                                    <p class="mb-0 text-gray"><?php echo strtoupper($row['titulo']) ?></p>
                                                </div>
                                                <p class="text-dark mb-2">
                                                    <?php echo ucfirst($row['mensaje']) ?>
                                                </p>
                                                <div class="row text-gray d-md-flex d-none">
                                                    <div class="col-4 d-flex">
                                                        <small class="mb-0 mr-2 text-muted text-muted">fecha: :</small>
                                                        <small class="last-responded mr-2 mb-0 text-muted text-muted"><?php echo $row['fecha'] ?></small>
                                                    </div>
                                                    <div class="col-8 d-flex">
                                                        <small class="mb-0 mr-2 text-muted text-muted">hecho por :</small>
                                                        <small class="last-responded mr-2 mb-0 text-muted text-muted"><?php echo strtolower($row['contacto']) ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="ticket-actions col-md-2">
                                                <div class="btn-group dropdown">
                                                    <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        manage
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-reply fa-fw"></i>responder</a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-history fa-fw"></i>otra accion</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-check text-success fa-fw"></i>aprobar</a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-times text-danger fa-fw"></i>eliminar</a>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php include 'fixed/footer.php' ?>
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
<script src="../js/off-canvas.js"></script>
<script src="../js/misc.js"></script>
<!-- endinject -->
<!-- custom js for this page-->
<script src="../js/dashboard.js"></script>
<!-- end custom js for this page-->

<script>

    $(function () {

        // initialize example 1
        $('#tabla').datatable({
            responsive: true
        });

    });

</script>
</body>


<!-- mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by httrack website copier/3.x [xr&co'2014], mon, 29 apr 2019 14:36:03 gmt -->
</html>
