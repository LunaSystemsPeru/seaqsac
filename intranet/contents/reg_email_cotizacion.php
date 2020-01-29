<?php
require '../../models/Presupuesto.php ';

$presupuesto=new Presupuesto();

$presupuesto->setIdCotizacion((filter_input(INPUT_GET, 'coti')));
$presupuesto->obtener_datos();

function quitar_tildes($cadena) {
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
}

$asunto = quitar_tildes(htmlspecialchars($presupuesto->getDescripcion()));
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:35:52 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agregar GAsto | SEAQ SAC - Software de Gestion </title>
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
                            <form action="../controller/reg_email_cotizacion.php" method="POST" name="email_to_form" class="form-horizontal">
                                <!--<label class="control-label">Buscar Correos:</label>
                                <div class="m-b-5">
                                    <input type="text" class="form-control" name="input_buscar" />
                                </div>-->
                                <!-- begin email to -->
                                <label class="control-label">Para (separar con comas):</label>
                                <div class="m-b-12">
                                    <input type="text" class="form-control" name="input_correo" />
                                </div>
                                <label class="control-label">Con Copia:</label>
                                <div class="m-b-15">
                                    <input type="text" class="form-control" value="kgarcia@seaqsac.com" readonly="true"/>
                                </div>
                                <!-- end email to -->
                                <!-- begin email subject -->
                                <label class="control-label">Asunto:</label>
                                <div class="m-b-15">
                                    <input type="text" class="form-control" value="<?php echo $asunto ?>" name="input_asunto" />
                                </div>
                                <!-- end email subject -->
                                <!-- begin email content -->
                                <label class="control-label">Mensaje:</label>
                                <div class="m-b-15">
                                    <textarea class="textarea form-control" rows="20" name="input_mensaje">
Estimados Señores:
Presente.-

Por medio de la presente es muy grato dirigirme a Usted para presentarle como adjunto, nuestra propuesta economica, por "SERVICIOS DE <?php echo $presupuesto->getDescripcion() ?>" de acuerdo a lo solicitado.

Adjuntamos nuestra cotizacion

Atentamente


c: --
e: --

                                    </textarea>
                                </div>
                                <label class="control-label">Archivo:</label>
                                <div class="m-b-15">
                                    <p><?php echo $presupuesto->getArchivo() ?></p>
                                    <input type="hidden" name="input_archivo" value="<?php echo $presupuesto->getArchivo() ?>" />
                                    <input type="hidden" name="input_ccliente" value="<?php echo $presupuesto->getIdCliente() ?>" />
                                    <!--input type="hidden" name="input_ccsucursal" value="<?php  ?>" /-->

                                </div>
                                <!-- end email content -->
                                <button type="submit" class="btn btn-primary p-l-40 p-r-40">Enviar</button>
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
<script src="../../vendors/assets/js/off-canvas.js"></script>
<script src="../../vendors/assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../vendors/assets/js/dashboard.js"></script>
<script src="../../vendors/assets/js/funciones_basicas.js"></script>
<!-- End custom js for this page-->

</body>


<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-free/jquery/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:36:03 GMT -->
</html>