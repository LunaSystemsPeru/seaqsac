<?php
require '../models/cl_cliente.php';
$c_cliente = new cl_cliente();

require '../models/cl_tipos.php';
$c_tipo = new cl_tipos();
$c_tipo->setCodigo(1);
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrar Informe de Monitoreos | SEAQ SAC - Software de Gestion </title>
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
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../public/assets/images/favicon.png"/>
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
                            <form enctype="multipart/form-data" class="form-sample" method="post" action="../controller/reg_monitoreo.php" >
                                <div class="card-header">
                                    <h4 class="h3">Agregar Informe de Monitoreo</h4>
                                </div>
                                <div class="card-body">


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Fecha</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="input_fecha" id="input_fecha" value="<?php echo date("Y-m-d") ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cliente</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_cliente" name="select_cliente" onchange="cargar_sucursales()">
                                                <?php
                                                $resultado = $c_cliente->ver_clientes();
                                                while ($row = $resultado->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row['id_clientes'] ?>"><?php echo $row['razon_social'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="reg_cliente.php" class="btn btn-info"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Ubicacion</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_sucursal" name="select_sucursal">
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-info" onclick="agregar_sucursal()"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tipo Monitoreo</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="select_tipo" name="select_tipo" onchange="cargar_clase()">
                                                <?php
                                                $c_tipo->setCodigo(1);
                                                $resultado = $c_tipo->ver_tipos_codigo();
                                                while ($row = $resultado->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row['id_tipo'] ?>"><?php echo $row['nombre'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Clasificacion</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="select_clase" name="select_clase">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">URL Archivo</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="15728640" />
                                            <input type="file" class="form-control" name="input_url" id="input_url"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success mr-2" onclick="comprueba_extension(this.form, this.form.input_url.value)">Guardar</button>
                                </div>
                            </form>
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
<script src="../public/assets/js/off-canvas.js"></script>
<script src="../public/assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../public/assets/js/dashboard.js"></script>
<!-- End custom js for this page-->

<script>

    $(function () {

        // Initialize Example 1
        $('#tabla').dataTable({
            responsive: true
        });
        cargar_clase();
        cargar_sucursales();

    });



</script>
<script>
    function cargar_sucursales() {
        var ssucursal = $("#select_sucursal");
        var scliente = $("#select_cliente");
        var id_cliente = scliente.val();
        $.ajax({
            data: {"id_cliente": id_cliente},
            url: 'peticiones_post_json/ver_sucursales_cliente.php',
            type: 'post',
            beforeSend: function () {
                ssucursal.prop("disabled", true);
            },
            success: function (response) {
                ssucursal.prop("disabled", false);
                ssucursal.find('option').remove();
                var json = JSON.parse(response);
                $(json.data).each(function (key, registro) {
                    ssucursal.append('<option value="' + registro.id_sucursal + '">' + registro.nombre + '</option>');
                });
            },
            error: function () {
                ssucursal.prop("disabled", true);
            }
        });
    }
    
    function agregar_sucursal() {
        var scliente = $("#select_cliente");
        var id_cliente = scliente.val();
        window.location.href = "ver_clientes_sucursal.php?id_cliente=" + id_cliente;
    }
</script>

<script>
    function cargar_clase() {
        var stipo = $("#select_tipo");
        var sclase = $("#select_clase");
        var id_tipo = stipo.val();
        $.ajax({
            data: {
                "id_tipo": id_tipo
            },
            url: 'peticiones_post_json/ver_clases_tipo.php',
            type: 'post',
            beforeSend: function () {
                sclase.prop("disabled", true);
            },
            success: function (response) {
                sclase.prop("disabled", false);
                sclase.find('option').remove();
                var json = JSON.parse(response);
                $(json.data).each(function (key, registro) {
                    sclase.append('<option value="' + registro.id_subclase + '">' + registro.nombre + '</option>');
                });
            },
            error: function () {
                sclase.prop("disabled", true);
            }
        });
    }
</script>

<script>
    function comprueba_extension(formulario, archivo) { 
        extensiones_permitidas = new Array(".docx", ".doc", ".pdf"); 
        mierror = ""; 
        if (!archivo) { 
           //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 
             mierror = "No has seleccionado ningún archivo"; 
        }else{ 
           //recupero la extensión de este nombre de archivo 
           extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
           //alert (extension); 
           //compruebo si la extensión está entre las permitidas 
           permitida = false; 
           for (var i = 0; i < extensiones_permitidas.length; i++) { 
              if (extensiones_permitidas[i] === extension) { 
              permitida = true; 
              break; 
              } 
           } 
           if (!permitida) { 
              mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join(); 
             }else{ 
                     //submito! 
              alert ("Todo correcto. Voy a submitir el formulario."); 
              formulario.submit(); 
              return 1; 
             } 
        } 
        //si estoy aqui es que no se ha podido submitir 
        alert (mierror); 
        return 0; 
    }
</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>