<?php
include 'cabeza.php';
if (is_null(filter_input(INPUT_GET, 'id_tipo'))) {
    header("Location: ver_tipos.php");
}
require '../../models/TipoClasificacion.php';
$c_tipo = new TipoClasificacion();
$c_tipo->setId(filter_input(INPUT_GET, 'id_tipo'));
$c_tipo->obtener_datos();

require '../../models/TipoSubClase.php';
$c_clase = new TipoSubClase();
$c_clase->setIdTipo(filter_input(INPUT_GET, 'id_tipo'));
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Generales - nivel III - Tipos | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Tipo: <?php echo $c_tipo->getNombre()?></h4>
                                <a class="btn btn-success" href="ver_tipos.php?id_general=<?php echo $c_tipo->getCodigo()?>"><i class="fa fa-arrow-left"></i>Ver Clasificacion</a>
                                <button class="btn btn-info" data-toggle="modal" data-target="#modalcrear"><i class="fa fa-plus"></i>Agregar</button>

                                <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="forms-sample" method="post" action="../controller/reg_tipo_clasificacion.php">
                                                <div class="color-line"></div>
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title">Agregar Sub Clasificacion</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Nombre</label>
                                                        <input type="text" class="form-control" id="input_nombre" name="input_nombre" required>
                                                        <input type="hidden" name="hidden_id_tipo" value="<?php echo $c_tipo->getId() ?>">
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
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th width="18%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $resultado = $c_clase->ver_clases();
                                        while ($row = $resultado->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id_subclase'] ?></td>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td>
                                                    <button onclick="setdata(<?php echo $row['id_subclase'].",'".$row['nombre']."','".$row['id_tipo']."'"?>)" class="btn btn-info btn-sm" data-target="#modaledit" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                    <button onclick="eliminar(<?php echo $row['id_subclase'] ?>)"class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
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
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="forms-sample" method="post" action="../controller/udt_tipo_clasificacion.php">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Agregar Sub Clasificacion</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName1">Nombre</label>
                        <input type="text" class="form-control" id="input_nom" name="input_nom" required>
                        <input type="hidden" name="hidden_id_tipo" value="<?php echo $c_tipo->getId() ?>">
                        <input type="hidden" name="id_subc" value="" id="id_subc">
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

    function setdata(id, nombre, idtipo)
    {
        console.log(id +"-" + "-" + nombre + "-" + idtipo);
        $('#input_nom').val(nombre);
        $('#hidden_id_tipo').val(idtipo);
        $('#id_subc').val(id);
    }

    $(function () {

        // Initialize Example 1
        $('#tabla').dataTable({
            responsive: true
        });

    });


    function eliminar(id ) {
        $.ajax({
            type:"POST",
            url: '../controller/del_tipo_subclase.php?id_subclase ='+id,
            success: function(respuesta) {
                console.log("error: "+respuesta);
                if (IsJsonString(respuesta)){
                    location.reload();
                }else {
                    alert("No se puede eliminar");
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

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>