<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Inicio</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ver_ventas.php">
                <i class="menu-icon mdi mdi-receipt"></i>
                <span class="menu-title">Ver Documentos de Venta</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ver_informe_monitoreos.php">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Ver Informes de Monitoreo</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ver_capacitaciones_clientes.php">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Ver Capacitaciones</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ver_informe_auditorias.php">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Ver Informes de Auditoria</span>
            </a>
        </li>
        <li class="nav-item nav-profile">
            <div class="nav-link ">
                <div class="row">
                    <img src="../intranet/archivos_cliente/logos/<?php echo $_SESSION['url_logo'] ?>" alt="logo Cliente" width="100%" height="100%">
                </div>
            </div>
        </li>
    </ul>
</nav>