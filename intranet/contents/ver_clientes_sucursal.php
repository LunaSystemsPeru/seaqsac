<?php
include 'cabeza.php';
if (is_null(filter_input(INPUT_GET, 'id_cliente'))) {
    header("Location: ver_clientes.php");
}
require '../../models/Cliente.php';
$c_cliente = new Cliente();
$c_cliente->setIdCliente(filter_input(INPUT_GET, 'id_cliente'));
$c_cliente->obtener_datos();

require '../../models/Empresa.php';
$c_empresa = new Empresa();
$c_empresa->setIdEmpresa($c_cliente->getIdEmpresa());
$c_empresa->obtener_datos();

require '../../models/ClienteSucursal.php';
$c_sucursal = new ClienteSucursal();
$c_sucursal->setIdCliente($c_cliente->getIdCliente());
?>
<!DOCTYPE html>
<html lang="es">


    <!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Required meta tags -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Ubicaciones del Cliente | SEAQ SAC - Software de Gestion </title>
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
                            <div class="col-lg-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="h3">Datos del Cliente</h4>
                                    </div>
                                    <div class="card-body">
                                        <p><span class="font-weight-bold">Razon Social: </span> <?php echo $c_cliente->getRazonSocial() ?></p>
                                        <p><span class="font-weight-bold">RUC: </span> <?php echo $c_cliente->getRuc() ?></p>
                                        <p><span class="font-weight-bold">Direccion: </span> <?php echo $c_cliente->getDireccion() ?></p>
                                        <p><span class="font-weight-bold">Ultimo Servicio: </span> <?php echo $c_cliente->getUltimoServicio() ?></p>
                                        <?php
                                        if ($c_cliente->getTipo() == 1) {
                                            ?>
                                            <a href="../controller/enviar_email_acceso.php?id_cliente=<?php echo $c_cliente->getIdCliente() ?>" class="btn btn-info"><i class="mdi mdi-message"></i>Enviar Acceso</a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class = "card-body">
                                        <p><span class = "font-weight-bold">Contacto: </span> <?php echo $c_cliente->getContacto()
                                        ?></p>
                                        <p><span class="font-weight-bold">Email: </span> <?php echo $c_cliente->getEmail() ?></p>
                                        <p><span class="font-weight-bold">Telefono: </span> <?php echo $c_cliente->getCelular() ?></p>
                                    </div>
                                    
                                    <div class = "card-body">
                                        <h5>Cliente de:</h5>
                                        <p><span class = "font-weight-bold">Empresa: </span> <?php echo $c_empresa->getRazonSocial()
                                        ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="h3">Relacion de Ubicaciones</h4>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#modalcrear"><i class="fa fa-plus"></i>Agregar</button>
                                        <a class="btn btn-success" href="ver_clientes.php"><i class="fa fa-arrow-left"></i>Ver Clientes</a>

                                        <div class="modal fade" id="modalcrear" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="forms-sample" method="post" action="../controller/reg_cliente_sucursal.php">
                                                        <div class="color-line"></div>
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title">Agregar Ubicacion</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Nombre</label>
                                                                <input type="text" class="form-control" id="input_nombre" name="input_nombre" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Direccion</label>
                                                                <input type="text" class="form-control" id="input_direccion" name="input_direccion" required>
                                                                <input type="hidden" name="hidden_id_cliente" value="<?php echo $c_sucursal->getIdCliente() ?>">
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
                                            <table id="tabla_sucursal" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nombre</th>
                                                        <th>Direccion</th>
                                                        <th width="18%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $resultado = $c_sucursal->ver_sucursales();
                                                    $item = 1;
                                                    while ($row = $resultado->fetch_assoc()) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $item ?></td>
                                                            <td><?php echo $row['nombre'] ?></td>
                                                            <td><?php echo $row['direccion'] ?></td>
                                                            <td>
                                                                <button onclick="setDatos(<?php echo $row['id_sucursal'].", '{$row['nombre'] }','{$row['direccion']}'" ?>)" data-toggle="modal" data-target="#formActualizar" class="btn btn-info btn-icons"><i class="fa fa-edit"></i></button>
                                                                <button class="btn btn-danger btn-icons" title="Eliminar Sucursal" onclick="eliminar('<?php echo $row['id_clientes']?>', '<?php echo $row['id_sucursal']?>')"><i class="fa fa-close"></i></button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $item++;
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

        <div class="modal fade" id="formActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-4">Modificar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formedicion">
                            <input type="hidden" name="hidden_id_cliente" value="<?php echo $c_sucursal->getIdCliente() ?>">
                            <input id="idsucursal" name="idsucursal" type="hidden" value="">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">nombre:</label>
                                <input type="text" class="form-control" id="nombre_su" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Direccion:</label>
                                <input type="text" class="form-control" id="direccion_su" name="direccion">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button onclick="actualizar()" type="button" class="btn btn-success">Guardar</button>
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
            
            function actualizar() {
                $.ajax({
                    type: "POST",
                    url: "../controller/udt_sucursal.php",
                    data: $("#formedicion").serialize(),
                    success: function (data) {
                        console.log(data);
                        if (IsJsonString(data)){
                            location.reload();
                        }else{
                            alert("Error al editar");
                        }
                    }
                });
            }
            function setDatos(id,nombre,descrip){
                $("#idsucursal").val(id);
                $("#nombre_su").val(nombre);
                $("#direccion_su").val(descrip);
            }
            $(function () {

                // Initialize Example 1
                $('#tabla').dataTable({
                    responsive: true
                });

            });

            function eliminar(id_cliente, id_sucursal) {
                if (!confirm("¿Está seguro de que desea eliminar la Sucursal Seleccionada?")) {
                    return false;
                }
                else {
                    document.location = "../controller/del_cliente_sucursal.php?id_cliente=" + id_cliente + "&id_sucursal=" + id_sucursal;
                    return true;
                }
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