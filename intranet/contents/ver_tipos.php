<?php
include 'cabeza.php';
require '../../models/TipoClasificacion.php';
$c_tipo = new TipoClasificacion();

require '../../models/TipoGeneral.php';
$c_general = new TipoGeneral();

$id_general = filter_input(INPUT_GET, 'id_general');
$c_tipo->setCodigo($id_general);
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Generales Nivel II | SEAQ SAC - Software de Gestion </title>
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
                                <h4 class="h3">Relacion de Tipos</h4>
                                <a href="ver_tipos_codigo.php" class="btn btn-info" ><i class="fa fa-arrow-left"></i>ver Lista General</a>
                                <button class="btn btn-info" data-target="#modalcrear" data-toggle="modal"><i class="fa fa-plus"></i>Agregar</button>
                            </div>

                            <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form class="forms-sample" method="post" action="../controller/reg_tipo.php">
                                            <div class="color-line"></div>
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Agregar Tipo</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Descripcion </label>
                                                    <input type="text" class="form-control" id="input_descripcion" name="input_descripcion">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Categoria</label>
                                                    <select class="form-control" id="select_categoria" name="select_categoria">
                                                        <?php
                                                        $resultado = $c_general->ver_tipos();
                                                        while ($row = $resultado->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $row['id_codigo']?>"><?php echo $row['nombre']?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Descripcion</th>
                                            <th>Codigo</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $resultado = $c_tipo->ver_tipos();
                                        while ($row = $resultado->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id_tipo'] ?></td>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td><?php echo $row['ncodigo'] ?></td>
                                                <td>
                                                    <a href="ver_tipos_categoria.php?id_tipo=<?php echo $row['id_tipo'] ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                    <button onclick="setdata(<?php echo $row['id_tipo'].",'".$row['nombre']."','".$row['codigo']."'"?>)" class="btn btn-info btn-sm" data-target="#modaledit" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                    <button onclick="eliminar(<?php echo $row['id_tipo'] ?>)" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
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
            <form class="forms-sample" method="post" action="../controller/udt_tipo.php">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Agregar Tipo</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName1">Descripcion </label>
                        <input type="text" class="form-control" id="input_desc" name="input_desc">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categoria</label>
                        <input type="hidden" name="id_tipo" value="" id="id_tipo">
                        <select class="form-control" id="select_cat" name="select_cat">
                            <?php
                            $resultado = $c_general->ver_tipos();
                            while ($row = $resultado->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['id_codigo']?>"><?php echo $row['nombre']?></option>
                                <?php
                            }
                            ?>
                        </select>
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

    function setdata(id, nombre, idcodigo)
    {
        console.log(id +"-" + "-" + nombre + "-" + idcodigo);
        $('#input_desc').val(nombre);
        $('#select_cat option[value='+idcodigo+']').attr("selected", true);
        $('#id_tipo').val(id);
    }
    $(function () {

        // Initialize Example 1
        $('#tabla').dataTable({
            responsive: true
        });

    });

    function eliminar(id ) {
        $.ajax({
            type:"GET",
            url: '../controller/del_tipo.php?id_tipo='+id,
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