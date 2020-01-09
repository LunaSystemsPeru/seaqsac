<?php
require 'clases/Monitoreo.php';
require 'clases/MonitoreoComentario.php';
require 'clases/MonitoreoAnexo.php';
require 'clases/Cliente.php';
require 'clases/ClienteSucursal.php';
require 'clases/TipoClasificacion.php';
require 'clases/TipoSubClase.php';
require 'clases/Equipo.php';
require 'clases/MonitoreoEquipo.php';


$c_monitoreo = new Monitoreo();
$c_monitoreo->setIdMonitoreo(filter_input(INPUT_GET, 'id_monitoreo'));
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


$c_tipo = new TipoClasificacion();
$c_tipo->setId($c_monitoreo->getIdTipo());
$c_tipo->obtener_datos();


$c_clase = new TipoSubClase();
$c_clase->setIdTipo($c_monitoreo->getIdTipo());
$c_clase->setIdClase($c_monitoreo->getIdClase());
$c_clase->obtener_datos();

$c_equipos = new Equipo();

$c_mequipos = new MonitoreoEquipo();
$c_mequipos->setIdMonitoreo($c_monitoreo->getIdMonitoreo());
?>
<!DOCTYPE html>
<html lang="es">


<!-- mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by httrack website copier/3.x [xr&co'2014], mon, 29 apr 2019 14:35:52 gmt -->
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Estado del informe de monitoreo | SEAQ SAC - Software de Gestion </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/iconfonts/font-awesome/css/font-awesome.min.css"/>
    <!-- plugin css for this page -->
    <!-- end plugin css for this page -->
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
                    <div class="col-lg-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">datos del informe</h4>
                            </div>
                            <?php
                            if ($c_monitoreo->getestado() == 1) {
                                $valor_estado = '<label class="badge badge-warning">Pendiente</label>';
                            }
                            $url_informe = "../archivos/clientes/monitoreos/" . $c_monitoreo->getIdCliente() . "/" . $c_monitoreo->getIdSucursal() . "/" . $c_monitoreo->getUrlInforme();
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
                                            <form class="forms-sample" method="post" action="procesos/reg_monitoreo_comentario.php">
                                                <div class="color-line"></div>
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title">Agregar Comentario</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Autor</label>
                                                        <div class="input-group col-xs-12">
                                                            <input type="text" class="form-control" id="input_autor" name="input_autor" maxlength="45" value="Kristian Garcia">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Titulo: </label>
                                                        <input type="text" class="form-control" id="input_titulo" name="input_titulo">
                                                        <input type="hidden" id="hidden_id_monitoreo" name="hidden_id_monitoreo" value="<?php echo $c_monitoreo->getIdMonitoreo() ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Mensaje: </label>
                                                        <textarea class="form-control" id="input_mensaje" name="input_mensaje" rows="6"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Informe: </label>
                                                        <input type="file" class="form-control" id="input_informe" name="input_informe">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="exampleInputName1">Accion: </label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="radio_tipo" id="radio_tipo1" value="1" checked> Responder
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="radio_tipo" id="radio_tipo2" value="2"> Aprobar
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
                                                <img class="img-sm rounded-circle mb-4 mb-md-0" src="archivos_cliente/logos/<?php echo $face ?>" alt="profile image">
                                            </div>
                                            <div class="ticket-details col-md-9">
                                                <div class="d-flex">
                                                    <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap"><?php echo $empresa ?>:</p>
                                                    <p class="text-primary mr-1 mb-0">[<?php echo $row['id_monitoreos'] . "-" . $row['id_comentario'] ?>]</p>
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
                                            <div class="ticket-actions col-md-2">
                                                <div class="btn-group dropdown">
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_comentario('<?php echo $row['id_monitoreos']?>', '<?php echo $row['id_comentario']?>')">
                                                        <i class="fa fa-close"></i>Eliminar
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">Archivos / Anexos / Ensayos</h4>
                                <button class="btn btn-info" data-toggle="modal" data-target="#modalanexo"><i class="fa fa-user-plus"></i>agregar Anexo</button>

                                <div class="modal fade" id="modalanexo" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="forms-sample" enctype="multipart/form-data" method="post" action="procesos/reg_monitoreo_anexo.php">
                                                <div class="color-line"></div>
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title">Agregar Archivo - Anexo</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Fecha</label>
                                                        <div class="input-group col-xs-12">
                                                            <input type="date" class="form-control" id="input_fecha" name="input_fecha" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Descripcion: </label>
                                                        <input type="text" class="form-control" id="input_descripcion" name="input_descripcion" required>
                                                        <input type="hidden" id="hidden_id_monitoreo_anexo" name="hidden_id_monitoreo_anexo" value="<?php echo $c_monitoreo->getIdMonitoreo() ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Archivo: </label>
                                                        <input type="file" class="form-control" id="input_archivo" name="input_archivo" accept="application/pdf" required>
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="3145728"/>
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
                                <div class="table-responsive">
                                    <table id="tabla_anexo" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Descripcion</th>
                                            <th>Fecha</th>
                                            <th width="22%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_anexos = $c_anexo->ver_filas();
                                        foreach ($a_anexos as $fila) {
                                            $archivo = "../archivos/clientes/monitoreos/" . $fila['id_clientes'] . "/" . $fila['id_sucursal'] . "/" . $fila['archivo'];
                                            ?>
                                            <tr>
                                                <td><?php echo $fila['descripcion'] ?></td>
                                                <td><?php echo $fila['fecha'] ?></td>
                                                <td>
                                                    <a href="<?php echo $archivo ?>" target="_blank" class="btn btn-link btn-icons" title="Descargar archivo"><i class="fa fa-download"></i></a>
                                                    <button class="btn btn-danger btn-icons" title="Eliminar Documento" onclick="eliminar_anexo('<?php echo $fila['id_monitoreos'] ?>', '<?php echo $fila['id_anexos'] ?>')">
                                                        <i class="fa fa-close"></i>
                                                    </button>
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
                    <div class="col-lg-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="h3">Equipos</h4>
                                <button class="btn btn-info" data-toggle="modal" data-target="#modalequipo"><i class="fa fa-plus"></i>agregar equipo</button>

                                <div class="modal fade" id="modalequipo" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="forms-sample" method="post" action="procesos/reg_monitoreo_equipo.php">
                                                <div class="color-line"></div>
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title">Agregar Equipos de Medicion</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Seleccionar Equipo: </label>
                                                        <select class="form-control" name="select_equipo">
                                                            <?php
                                                            $a_equipos = $c_equipos->ver_filas();
                                                            foreach ($a_equipos as $fila) {
                                                                $nequipo = $fila['nombre'] . " " . $fila['marca'] . " " . $fila['modelo'] . " " . $fila['serie'];
                                                                ?>
                                                                <option value="<?php echo $fila['id_equipo'] ?>"><?php echo $nequipo ?></option>
                                                                <?php

                                                            }
                                                            ?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="hidden_id_monitoreo_equipo" name="hidden_id_monitoreo_equipo" value="<?php echo $c_monitoreo->getIdMonitoreo() ?>">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla_equipos" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th width="22%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_mequipos = $c_mequipos->ver_filas();
                                        foreach ($a_mequipos as $fila) {
                                            $mequipo = $fila['nombre'] . " " . $fila['marca'] . " " . $fila['modelo'] . " " . $fila['serie'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <a href="../archivos/equipos/<?php echo $fila['certificado']?>" target="_blank"><?php echo $mequipo?></a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-icons" title="Eliminar Equipo" onclick="eliminar_equipo('<?php echo $fila['id_monitoreos']?>', '<?php echo $fila['id_equipo']?>')"><i class="fa fa-close"></i></button>
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
<!-- plugin js for this page-->
<!-- end plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- end custom js for this page-->

<script>

    $(function () {
/*
        // initialize example 1
        $('#tabla').datatable({
            responsive: true
        });
*/
    });

    function eliminar_equipo(id_monitoreo, id_equipo) {
        if (!confirm("¿Está seguro de que desea eliminar el Equipo Seleccionado?")) {
            return false;
        }
        else {
            document.location = "procesos/del_monitoreo_equipo.php?id_monitoreo=" + id_monitoreo + "&id_equipo=" + id_equipo;
            return true;
        }
    }

    function eliminar_anexo(id_monitoreo, id_anexo) {
        if (!confirm("¿Está seguro de que desea eliminar el Anexo Seleccionado?")) {
            return false;
        }
        else {
            document.location = "procesos/del_monitoreo_anexo.php?id_monitoreo=" + id_monitoreo + "&id_anexo=" + id_anexo;
            return true;
        }
    }

    function eliminar_comentario(id_monitoreo, id_comentario) {
        if (!confirm("¿Está seguro de que desea eliminar el Comentario Seleccionado?")) {
            return false;
        }
        else {
            document.location = "procesos/del_monitoreo_comentario.php?id_monitoreo=" + id_monitoreo + "&id_comentario=" + id_comentario;
            return true;
        }
    }

</script>
</body>


<!-- mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by httrack website copier/3.x [xr&co'2014], mon, 29 apr 2019 14:36:03 gmt -->
</html>
